<?php
require 'db.php';

header('Content-Type: application/json');

if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $search = trim($_GET['q']);
    $searchWildcard = "%" . $search . "%";

    $stmt = $conn->prepare("
        SELECT 
            b.Title, 
            b.ISBN, 
            a.AuthorName
        FROM book b
        LEFT JOIN book_authorship ba ON b.ISBN = ba.ISBN
        LEFT JOIN author a ON ba.AuthorID = a.AuthorID
        WHERE TRIM(b.Title) LIKE ?
        LIMIT 10
    ");

    if ($stmt) {
        $stmt->bind_param("s", $searchWildcard);
        $stmt->execute();
        $result = $stmt->get_result();

        $results = [];

        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }

        if (!empty($results)) {
            echo json_encode($results);
        } else {
            echo json_encode(["error" => "No matches found"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => "Database query failed"]);
    }
} else {
    echo json_encode(["error" => "No search query provided"]);
}
?>
