<?php
session_start();
header('Content-Type: application/json');

// Always enable error reporting during development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/db.php'; // <-- FIXED path!

// Check if query parameter 'q' exists
if (!isset($_GET['q']) || empty($_GET['q'])) {
    http_response_code(400); // 400 Bad Request
    echo json_encode(['error' => 'Missing query']);
    exit();
}

$isbn = $_GET['q'];

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
  GROUP_CONCAT(DISTINCT a.AuthorName SEPARATOR ', ') AS AuthorName,
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
WHERE b.ISBN = ?
GROUP BY b.ISBN
";


$stmt = $conn->prepare($sql);

if (!$stmt) {
    http_response_code(500); // Server error
    echo json_encode(['error' => 'Database error: ' . $conn->error]);
    exit();
}

$stmt->bind_param("s", $isbn);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $book = $result->fetch_assoc()) {
    echo json_encode($book);
} else {
    http_response_code(404); // 404 Not Found
    echo json_encode(['error' => 'Book not found']);
}
?>

