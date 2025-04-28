<?php
session_start();
require_once __DIR__ . '/db.php';

// Check if logged in
if (!isset($_SESSION['username'])) {
  header('Location: auth_safe.php');
  exit();
}

// Handle search
$search = trim($_GET['q'] ?? '');

$books = [];

if ($search !== '') {
    $searchWildcard = "%" . $search . "%";

    $stmt = $conn->prepare("
        SELECT 
            b.Title, 
            b.ISBN, 
            a.AuthorName,
            b.Format
        FROM book b
        LEFT JOIN book_authorship ba ON b.ISBN = ba.ISBN
        LEFT JOIN author a ON ba.AuthorID = a.AuthorID
        WHERE (TRIM(b.Title) LIKE ? OR TRIM(a.AuthorName) LIKE ?)
        ORDER BY b.Title ASC
        LIMIT 32
    ");

    if ($stmt) {
        $stmt->bind_param("ss", $searchWildcard, $searchWildcard);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }

        $stmt->close();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container mt-4">
  <h1 class="mb-4">Search Results for "<?php echo htmlspecialchars($search); ?>"</h1>
  <div class="row" id="bookList">
    <?php if (count($books) > 0): ?>
      <?php foreach ($books as $book): ?>
        <div class="col-md-2 mb-3">
          <div class="card h-100">
            <img src="<?php echo $book['ISBN'] ? "https://covers.openlibrary.org/b/isbn/" . urlencode($book['ISBN']) . "-L.jpg" : "covers/placeholder.png"; ?>" 
                 class="card-img-top" 
                 alt="Book Cover" 
                 onerror="this.onerror=null; this.src='covers/placeholder.png';">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?php echo htmlspecialchars($book['Title'] ?? 'Untitled'); ?></h5>
              <p class="card-text text-muted"><?php echo htmlspecialchars($book['AuthorName'] ?? 'Unknown Author'); ?></p>
              <p class="card-text"><strong>Format:</strong> <?php echo htmlspecialchars($book['Format'] ?? 'Unknown Format'); ?></p>
              <a href="book.php?q=<?php echo urlencode($book['ISBN']); ?>" class="btn btn-primary mt-auto">View Details</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-warning">No matching books found.</p>
    <?php endif; ?>
  </div>
</div>

<script src="header.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

