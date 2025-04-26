<?php
require 'db.php';

header('Content-Type: application/json');

if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $search = trim($_GET['q']);
    $searchWildcard = "%" . $search . "%";

    $stmt = $conn->prepare("
        SELECT 
            Title,
            ISBN,
            Summary,
            Edition,
            Rating,
            Format
        FROM book
        WHERE ISBN = ? OR TRIM(Title) LIKE ?
        LIMIT 1
    ");
    $stmt->bind_param("ss", $search, $searchWildcard);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($book = $result->fetch_assoc()) {
        echo json_encode($book);
    } else {
        echo json_encode(["error" => "Book not found"]);
    }
} else {
    echo json_encode(["error" => "No search term provided"]);
}
?>

