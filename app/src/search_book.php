<?php
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
