<?php
header('Content-Type: application/json');
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

try {
    $pdo = new PDO("mysql:host=mysql;dbname=book_shop", "root", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Start transaction
    $pdo->beginTransaction();

    // Get the cart ID for the user
    $stmt = $pdo->prepare("SELECT CartID FROM shopping_cart WHERE CustomerID = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $cart = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($cart) {
        // Delete all items from the cart
        $stmt = $pdo->prepare("DELETE FROM cart_item WHERE CartID = ?");
        $stmt->execute([$cart['CartID']]);
    }

    $pdo->commit();
    echo json_encode(['success' => true, 'message' => 'Cart cleared successfully']);

} catch (PDOException $e) {
    $pdo->rollBack();
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?> 