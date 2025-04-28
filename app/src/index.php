<?php
session_start();

require_once __DIR__ . '/db.php';

if (!isset($_SESSION['username'])) {
  header('Location: auth.php');
  exit();
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
    <a class="navbar-brand" href="index.php">Lemma Books</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="d-flex flex-grow-1 justify-content-center">
      <form class="d-flex" role="search" id="searchForm" style="width: 60%;">
        <input class="form-control me-2 w-100" type="search" placeholder="Search for books or authors" id="searchInput">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>

    <div class="d-flex align-items-center ms-auto">
      <a class="nav-link" href="cart.php" title="View Cart">🛒</a>
      <form action="logout.php" method="post" class="d-inline ms-2">
        <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
      </form>
    </div>
  </div>

  </div>
</nav>

<div class="container mt-4">
  <h1 class="mb-4">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>

  <div class="row" id="bookList">
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
          : `covers/placeholder.png`;

        col.innerHTML = `
          <div class="card h-100">

            <img src="${coverURL}" class="card-img-top" alt="Book Cover" onerror="this.error=null; this.src='covers/placeholder.png';">

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
    fetch(`search.php?q=${encodeURIComponent(searchValue)}`)
      .then(res => res.json())
      .then(books => {
        const container = document.getElementById('bookList');
        container.innerHTML = '';

        if (!Array.isArray(books)) {
          container.innerHTML = `<p class="text-danger">${books.error || 'No books found.'}</p>`;
          return;
        }

        if (books.length === 0) {
          container.innerHTML = `<p class="text-warning">No matching books found.</p>`;
          return;
        }

        books.forEach(book => {
          const col = document.createElement('div');
          col.className = 'col-md-4 mb-4';

          const coverURL = book.ISBN 
            ? `https://covers.openlibrary.org/b/isbn/${book.ISBN}-L.jpg`
            : 'covers/placeholder.png';

          col.innerHTML = `
            <div class="card h-100">
              <img src="${coverURL}" 
                   class="card-img-top" 
                   alt="Book Cover" 
                   onerror="this.onerror=null; this.src='covers/placeholder.png';">
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
        console.error('Search failed:', err);
        document.getElementById('bookList').innerHTML = '<p class="text-danger">Error loading search results.</p>';
      });
  } else {
    fetchBooks(); 
  }
});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
