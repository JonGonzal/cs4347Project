<?php
$host = 'localhost';
$dbname = 'lemma_books';
$username = 'root';
$password = ''; // or your actual password

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
