<?php
require 'db.php';

header('Content-Type: application/json');

$sql = "
    SELECT 
        b.Title, 
        b.ISBN, 
        b.Format, 
        a.AuthorName
    FROM book b
    LEFT JOIN book_authorship ba ON b.ISBN = ba.ISBN
    LEFT JOIN author a ON ba.AuthorID = a.AuthorID
    LIMIT 100
";

$result = $conn->query($sql);

$books = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

echo json_encode($books);
?>

