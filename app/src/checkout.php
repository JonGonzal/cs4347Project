<?php
require_once '../config/db.php';
session_start();

$customerID = 1;
$shippingAddress = '123 Main Street';
$orderStatus = 'Placed';
$datePlaced = date('Y-m-d');

$conn->begin_transaction();

try {
    $conn->query("INSERT INTO `Order` (CustomerID, ShippingAddress, OrderStatus, DatePlaced)
                  VALUES ($customerID, '$shippingAddress', '$orderStatus', '$datePlaced')");
    $orderID = $conn->insert_id;

    $cartItems = $conn->query("SELECT ISBN, Qty FROM Shopping_cart WHERE customerID = $customerID");

    while ($item = $cartItems->fetch_assoc()) {
        $conn->query("INSERT INTO Books_Ordered (OrderID, ISBN, Qty)
                      VALUES ($orderID, '{$item['ISBN']}', {$item['Qty']})");
    }

    $conn->query("DELETE FROM Shopping_cart WHERE customerID = $customerID");

    $conn->commit();
    echo "Checkout successful. Order ID: $orderID";

} catch (Exception $e) {
    $conn->rollback();
    echo "Error during checkout: " . $e->getMessage();
}
?>
