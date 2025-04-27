<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: auth.php');
  exit;
}
require_once 'db.php';

$id = $_SESSION['user_id'];

$sql = "SELECT username, fname, lname, email FROM customer WHERE CustomerID = '$id'";
$result = $conn->query($sql);

$customer = null;
if ($result && $row = $result->fetch_assoc()) {
    $customer = $row;
} else {
    $customer = [
        'username' => '',
        'fname' => '',
        'lname' => '',
        'email' => ''
    ];
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bookstore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="d-flex ms-auto me-2" role="search" id="searchForm">
        <input class="form-control me-2" type="search" placeholder="Search" id="searchInput">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <a class="nav-link" href="cart.php">🛒</a>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h1 class="mb-4">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
  <div class="card mb-4">
  <div class="card-body">
    <h5 class="card-title">Your Account Information</h5>
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><strong>Username:</strong> <?php echo htmlspecialchars($customer['username']); ?></li>
      <li class="list-group-item"><strong>First Name:</strong> <?php echo htmlspecialchars($customer['fname']); ?></li>
      <li class="list-group-item"><strong>Last Name:</strong> <?php echo htmlspecialchars($customer['lname']); ?></li>
      <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($customer['email']); ?></li>
    </ul>
  </div>
</div>
  <div class="row" id="bookList">
    <!-- Books will be populated by JS -->
  </div>
</div>

<script>
  fetch('get_books.php')
    .then(res => res.json())
    .then(books => {
      const container = document.getElementById('bookList');
      container.innerHTML = '';

      if (!Array.isArray(books)) {
        container.innerHTML = '<p class="text-danger">Failed to load books.</p>';
        return;
      }

      books.forEach(book => {
        const col = document.createElement('div');
        col.className = 'col-md-4 mb-4';
        
        const coverURL = book.ISBN 
          ? `https://covers.openlibrary.org/b/isbn/${book.ISBN}-L.jpg`
          : 'https://via.placeholder.com/400x600?text=No+Cover';

        col.innerHTML = `
          <div class="card h-100">
            <img src="${coverURL}" class="card-img-top" alt="Book Cover" onerror="this.style.display='none';">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">${book.Title ?? 'Untitled'}</h5>
              <p class="card-text text-muted">${book.AuthorName ?? 'Unknown Author'}</p>
              <p class="card-text"><strong>Format:</strong> ${book.Format ?? 'Unknown Format'}</p>
              <a href="book.php?q=${encodeURIComponent(book.ISBN)}" class="btn btn-primary mt-auto">View Details</a>
            </div>
          </div>
        `;
        container.appendChild(col);
      });
    })
    .catch(err => {
      console.error('Failed to load books:', err);
      document.getElementById('bookList').innerHTML = '<p>Error loading books.</p>';
    });

  document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const searchValue = document.getElementById('searchInput').value.trim();
    if (searchValue) {
      window.location.href = `book.php?q=${encodeURIComponent(searchValue)}`;
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>