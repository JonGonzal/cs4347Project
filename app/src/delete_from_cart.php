<?php
require_once '../config/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn = $_POST['isbn'];
    $customerID = 1;

    $sql = "DELETE FROM Shopping_cart WHERE customerID = ? AND ISBN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $customerID, $isbn);
    $stmt->execute();
    echo "Item removed.";
}
?>
