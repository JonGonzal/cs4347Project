<?php
require_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO Customer (username, fname, lname, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $fname, $lname, $email);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "id" => $conn->insert_id]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }
}
?>
