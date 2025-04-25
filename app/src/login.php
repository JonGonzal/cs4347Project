<?php
require_once '../config/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];

    $stmt = $conn->prepare("SELECT CustomerID FROM Customer WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($cid);

    if ($stmt->fetch()) {
        $_SESSION['customerID'] = $cid;
        echo json_encode(["status" => "success", "id" => $cid]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid username"]);
    }
}
?>
