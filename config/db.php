<?php
/*
 $host = 'localhost';
 $dbname = 'lemma_books';
 $username = 'root';
 $password = ''; // or your actual password
 
 $conn = new mysqli($host, $username, $password, $dbname);
 
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 */
?>

<?php
$host = 'mysql';
$db   = 'lemma_books';
$user = 'root';
$pass = 'password';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
?>

<?php
// src/search_book.php
require_once '../config/db.php';

if (isset($_GET['q'])) {
    $search = $conn->real_escape_string($_GET['q']);
    $sql = "SELECT b.ISBN, b.Title, b.Summary, b.Rating, i.Price, a.AuthorName
            FROM Book b
            JOIN Inventory i ON b.ISBN = i.ISBN
            JOIN Book_Authorship ba ON b.ISBN = ba.ISBN
            JOIN Author a ON ba.AuthorID = a.AuthorID
            WHERE b.Title LIKE '%$search%' OR b.ISBN = '$search'
            LIMIT 1";
    $result = $conn->query($sql);
    echo json_encode($result->fetch_assoc());
}
?>

<?php
// src/cart.php
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

<?php
// src/view_cart.php
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

<?php
// src/delete_from_cart.php
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

<?php
// src/checkout.php
require_once '../config/db.php';
session_start();

$customerID = 1;
$shippingAddress = '123 Main Street'; // Simulated input
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

<?php
// src/register.php
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

<?php
// src/login.php
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

