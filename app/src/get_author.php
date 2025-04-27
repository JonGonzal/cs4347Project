<?php
require 'db.php';

header('Content-Type: application/json');

if (isset($_GET['isbn']) && !empty(trim($_GET['isbn']))) {
    $isbn = trim($_GET['isbn']);

    $stmt = $conn->prepare("
        SELECT a.AuthorName
        FROM book_authorship ba
        JOIN author a ON ba.AuthorID = a.AuthorID
        WHERE ba.ISBN = ?
        LIMIT 1
    ");

    if ($stmt) {
        $stmt->bind_param("s", $isbn);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($author = $result->fetch_assoc()) {
            echo json_encode($author);
        } else {
            echo json_encode(["error" => "Author not found"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => "Database error"]);
    }
} else {
    echo json_encode(["error" => "No ISBN provided"]);
}
?>
