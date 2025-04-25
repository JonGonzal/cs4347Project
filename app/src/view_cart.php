<?php
require_once '../config/db.php';
session_start();

$customerID = 1;
$sql = "SELECT b.Title, i.Price, s.Qty, (i.Price * s.Qty) as Total, b.ISBN
        FROM Shopping_cart s
        JOIN Book b ON s.ISBN = b.ISBN
        JOIN Inventory i ON b.ISBN = i.ISBN
        WHERE s.customerID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customerID);
$stmt->execute();
$result = $stmt->get_result();
$items = [];
while ($row = $result->fetch_assoc()) {
    $items[] = $row;
}
echo json_encode($items);
?>
