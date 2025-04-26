<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: auth.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Book Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Home</a>
    <form class="d-flex ms-auto me-2" role="search" id="searchForm">
      <input class="form-control me-2" type="search" placeholder="Search" id="searchInput">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <a class="nav-link" href="cart.php">🛒</a>
  </div>
</nav>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-4">
      <img id="bookCover" src="https://via.placeholder.com/400x600" class="img-fluid rounded" alt="Book Cover">
    </div>
    <div class="col-md-8">
      <h1 id="bookTitle">Book Title</h1>
      <h4 class="text-muted" id="bookAuthor">By Author</h4>
      <div class="mt-3">
        <span class="badge bg-secondary">Edition: <span id="bookEdition">N/A</span></span>
        <span class="badge bg-info">Rating: <span id="bookRating">N/A</span></span>
      </div>
      <div class="mt-4">
        <h5>Summary</h5>
        <p id="bookSummary">No summary available.</p>
      </div>
      <div class="mt-4">
        <h5>Details</h5>
        <ul class="list-unstyled">
          <li><strong>ISBN:</strong> <span id="bookISBN">N/A</span></li>
          <li><strong>Format:</strong> <span id="bookFormat">N/A</span></li>
        </ul>
      </div>
      <div class="mt-4">
        <button class="btn btn-primary btn-lg" id="addToCart" disabled>Add to Cart</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const urlParams = new URLSearchParams(window.location.search);
  const searchQuery = urlParams.get('q');

  if (searchQuery) {
    document.getElementById('searchInput').value = searchQuery;

    fetch(`get_book.php?q=${encodeURIComponent(searchQuery)}`)
      .then(res => res.json())
      .then(data => {
        console.log("Fetched data:", data);

        if (data && !data.error) {
          document.title = `${data.Title || 'Untitled'} - Book Details`;
          document.getElementById('bookTitle').textContent = data.Title || 'Untitled';
          document.getElementById('bookISBN').textContent = data.ISBN || 'N/A';
          document.getElementById('bookEdition').textContent = data.Edition || 'N/A';
          document.getElementById('bookRating').textContent = data.Rating || 'N/A';
          document.getElementById('bookSummary').textContent = data.Summary || 'No summary available.';
          document.getElementById('bookFormat').textContent = data.Format || 'Unknown Format';

          const coverURL = data.ISBN
            ? `https://covers.openlibrary.org/b/isbn/${data.ISBN}-L.jpg`
            : 'https://via.placeholder.com/400x600?text=No+Cover';
          document.getElementById('bookCover').src = coverURL;

          if (data.ISBN) {
            fetch(`get_author.php?isbn=${encodeURIComponent(data.ISBN)}`)
              .then(res => res.json())
              .then(authorData => {
                if (authorData && authorData.AuthorName) {
                  document.getElementById('bookAuthor').textContent = `By ${authorData.AuthorName}`;
                } else {
                  document.getElementById('bookAuthor').textContent = 'By Unknown Author';
                }

                document.getElementById('addToCart').disabled = false;
                document.getElementById('addToCart').addEventListener('click', () => {
                  const cart = JSON.parse(localStorage.getItem('cart')) || [];
                  const existing = cart.find(item => item.isbn === (data.ISBN || ''));

                  if (existing) {
                    existing.quantity += 1;
                  } else {
                    cart.push({
                      title: data.Title || 'Untitled',
                      author: document.getElementById('bookAuthor').textContent.replace('By ', '') || 'Unknown Author',
                      isbn: data.ISBN || '',
                      format: data.Format || 'Unknown Format',
                      quantity: 1
                    });
                  }

                  localStorage.setItem('cart', JSON.stringify(cart));
                  alert(`${data.Title || 'Book'} added to cart!`);
                });
              })
              .catch(err => {
                console.error("Author fetch error:", err);
                document.getElementById('bookAuthor').textContent = 'By Unknown Author';

                document.getElementById('addToCart').disabled = false;
                document.getElementById('addToCart').addEventListener('click', () => {
                  const cart = JSON.parse(localStorage.getItem('cart')) || [];
                  const existing = cart.find(item => item.isbn === (data.ISBN || ''));

                  if (existing) {
                    existing.quantity += 1;
                  } else {
                    cart.push({
                      title: data.Title || 'Untitled',
                      author: document.getElementById('bookAuthor').textContent.replace('By ', '') || 'Unknown Author',
                      isbn: data.ISBN || '',
                      format: data.Format || 'Unknown Format',
                      quantity: 1
                    });
                  }

                  localStorage.setItem('cart', JSON.stringify(cart));
                  alert(`${data.Title || 'Book'} added to cart!`);
                });
              });
          }
        } else {
          document.querySelector('.container').innerHTML = `
            <div class="alert alert-warning" role="alert">
              Book not found. <a href="index.php" class="alert-link">Go back to search.</a>
            </div>
          `;
        }
      })
      .catch(err => {
        console.error("Fetch error:", err);
        document.querySelector('.container').innerHTML = `
          <div class="alert alert-danger" role="alert">
            Error loading book details. Please try again later.
          </div>
        `;
      });
  }

  document.getElementById('searchForm').addEventListener('submit', e => {
    e.preventDefault();
    const searchValue = document.getElementById('searchInput').value.trim();
    if (searchValue) {
      window.location.href = `book.php?q=${encodeURIComponent(searchValue)}`;
    }
  });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
