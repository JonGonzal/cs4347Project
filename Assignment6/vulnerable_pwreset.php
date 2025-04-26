<?php
$conn = new mysqli('localhost', 'root', '', 'book_shop'); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Raw user input (bad)
$email = $_POST['email'];
$new_password = $_POST['new_password'];

// Vulnerable update query
$sql = "UPDATE customer SET CustomerID = '$new_password' WHERE Email = '$email'";

echo "<p>(SQL: $sql)</p>"; 

if ($conn->query($sql) === TRUE) {
    echo "<h3>Password Updated Successfully!</h3>";
} else {
    echo "<h3>Error updating password: " . $conn->error . "</h3>";
}

$conn->close();
?>
