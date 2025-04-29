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
    
    // Get cart items with book details
    $stmt = $pdo->prepare("
        SELECT 
            ci.ISBN,
            ci.Quantity,
            b.Title,
            GROUP_CONCAT(a.AuthorName SEPARATOR ', ') as AuthorName,
            b.Format,
            i.Price
        FROM cart_item ci
        JOIN shopping_cart sc ON ci.CartID = sc.CartID
        JOIN book b ON ci.ISBN = b.ISBN
        JOIN book_authorship ba ON b.ISBN = ba.ISBN
        JOIN author a ON ba.AuthorID = a.AuthorID
        JOIN inventory i ON b.ISBN = i.ISBN
        WHERE sc.CustomerID = ?
        GROUP BY ci.ISBN, ci.Quantity, b.Title, b.Format, i.Price
    ");
    $stmt->execute([$_SESSION['user_id']]);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode(['success' => true, 'items' => $items]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?> 