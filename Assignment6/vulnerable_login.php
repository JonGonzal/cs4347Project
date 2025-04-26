<?php
$conn = new mysqli('localhost', 'root', '', 'book_shop');

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$customer_id = $_POST['customer_id'];

$sql = "SELECT * FROM customer WHERE Username = '$username' AND CustomerID = '$customer_id'";

echo "<p>(SQL: $sql)</p>"; 
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
$row = $result->fetch_assoc();
$first_name = htmlspecialchars($row['Fname']);
$last_name = htmlspecialchars($row['Lname']);
$email = htmlspecialchars($row['Email']);

echo "<h3>Login successful! Welcome, $first_name $last_name!</h3>";
echo "<p><strong>Email:</strong> $email</p>";
} else {
echo "<h3>Login failed. Invalid name or Customer ID.</h3>";
}

$conn->close();
?>
