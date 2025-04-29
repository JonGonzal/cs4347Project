<?php
header('Content-Type: application/json');
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);
$isbn = $data['isbn'] ?? null;
$quantity = $data['quantity'] ?? 1;

if (!$isbn) {
    http_response_code(400);
    echo json_encode(['error' => 'ISBN is required']);
    exit();
}

try {
    $pdo = new PDO("mysql:host=mysql;dbname=book_shop", "root", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Start transaction
    $pdo->beginTransaction();

    // Get or create shopping cart for user
    $stmt = $pdo->prepare("SELECT CartID FROM shopping_cart WHERE CustomerID = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $cart = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cart) {
        // Create new cart if user doesn't have one
        $stmt = $pdo->prepare("INSERT INTO shopping_cart (CustomerID) VALUES (?)");
        $stmt->execute([$_SESSION['user_id']]);
        $cartId = $pdo->lastInsertId();
    } else {
        $cartId = $cart['CartID'];
    }

    // Check if item already exists in cart
    $stmt = $pdo->prepare("SELECT Quantity FROM cart_item WHERE CartID = ? AND ISBN = ?");
    $stmt->execute([$cartId, $isbn]);
    $existingItem = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingItem) {
        $newQuantity = $existingItem['Quantity'] + $quantity;
        
        if ($newQuantity <= 0) {
            // Remove item if quantity would be zero or negative
            $stmt = $pdo->prepare("DELETE FROM cart_item WHERE CartID = ? AND ISBN = ?");
            $stmt->execute([$cartId, $isbn]);
            $message = 'Item removed from cart';
        } else {
            // Update quantity if it would be positive
            $stmt = $pdo->prepare("UPDATE cart_item SET Quantity = ? WHERE CartID = ? AND ISBN = ?");
            $stmt->execute([$newQuantity, $cartId, $isbn]);
            $message = 'Cart updated successfully';
        }
    } else {
        // Only insert if quantity is positive
        if ($quantity > 0) {
            $stmt = $pdo->prepare("INSERT INTO cart_item (CartID, ISBN, Quantity) VALUES (?, ?, ?)");
            $stmt->execute([$cartId, $isbn, $quantity]);
            $message = 'Item added to cart successfully';
        } else {
            $message = 'Item not added to cart';
        }
    }

    $pdo->commit();
    echo json_encode(['success' => true, 'message' => $message]);

} catch (PDOException $e) {
    $pdo->rollBack();
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?> 