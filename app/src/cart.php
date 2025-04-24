<?php
require_once '../config/db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $isbn = $_POST['isbn'];
    $qty = $_POST['qty'];
    $customerID = 1;

    $sql = "INSERT INTO Shopping_cart (cartID, customerID, ISBN, Qty) 
            VALUES (UUID(), ?, ?, ?) 
            ON DUPLICATE KEY UPDATE Qty = Qty + ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isiii", $customerID, $isbn, $qty, $qty);
    $stmt->execute();
    echo "Added to cart.";
}
?>
