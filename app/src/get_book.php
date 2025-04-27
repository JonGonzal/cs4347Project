<?php
require 'db.php';

if (!isset($_GET['q'])) {
    echo json_encode(['error' => 'Missing query']);
    exit();
}

$isbn = $conn->real_escape_string($_GET['q']);

$sql = "
SELECT 
  b.ISBN,
  b.Title,
  b.Summary,
  b.Edition,
  b.Rating,
  b.Format,
  b.Pages,
  i.Price,
  i.Qty,
  a.AuthorName,
  GROUP_CONCAT(DISTINCT g.Genre_name SEPARATOR ', ') AS Genres,
  GROUP_CONCAT(DISTINCT t.Keyword SEPARATOR ', ') AS Awards
FROM book b
LEFT JOIN inventory i ON b.ISBN = i.ISBN
LEFT JOIN book_authorship ba ON b.ISBN = ba.ISBN
LEFT JOIN author a ON ba.AuthorID = a.AuthorID
LEFT JOIN book_genres bg ON b.ISBN = bg.ISBN
LEFT JOIN genres g ON bg.GenreID = g.GenreID
LEFT JOIN tagged_as ta ON b.ISBN = ta.ISBN
LEFT JOIN tag t ON ta.TagID = t.TagID
WHERE b.ISBN = '$isbn'
GROUP BY b.ISBN
";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $book = $result->fetch_assoc();
    echo json_encode($book);
} else {
    echo json_encode(['error' => 'Book not found']);
}
?>