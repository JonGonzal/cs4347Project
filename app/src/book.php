<?php
session_start();

require_once __DIR__ . '/db.php';

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

<?php include 'header.php';?>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-4">
      <img id="bookCover"
           src="covers/placeholder.png"
           class="img-fluid rounded"
           alt="Book Cover"
           onerror="this.onerror=null; this.src='covers/placeholder.png';">
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
        <button id="toggleSummaryBtn" class="btn btn-link p-0" style="display: none;">View More</button>
      </div>
      <div class="mt-4">
        <h5>Details</h5>
        <ul class="list-unstyled">
          <li><strong>Price:</strong> $<span id="bookPrice">N/A</span></li>
          
          <li><strong>Pages:</strong> <span id="bookPages">N/A</span></li>
          <li><strong>Format:</strong> <span id="bookFormat">N/A</span></li>
          <li><strong>Genres:</strong> <span id="bookGenres">N/A</span></li>
          <li><strong>Awards:</strong> <span id="bookAwards">N/A</span></li>
          <li><strong>ISBN:</strong> <span id="bookISBN">N/A</span></li>
        </ul>
      </div>

      <div class="mt-4">
        <button class="btn btn-primary btn-lg" id="addToCart" disabled>Add to Cart</button>
        <div id="messageContainer" class="my-3"</div>
      </div>
    </div>
  </div>
</div>

<script src="header.js"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const urlParams = new URLSearchParams(window.location.search);
  const searchQuery = urlParams.get('q');

  if (searchQuery) {
    document.getElementById('searchInput').value = searchQuery;

    fetch(`get_book.php?q=${encodeURIComponent(searchQuery)}`)
      .then(res => res.json())
      .then(data => {
        if (data && !data.error) {
          document.title = `${data.Title || 'Untitled'} - Book Details`;
          document.getElementById('bookTitle').textContent = data.Title || 'Untitled';
          document.getElementById('bookAuthor').textContent = `By ${data.AuthorName || 'Unknown Author'}`;
          document.getElementById('bookEdition').textContent = data.Edition || 'N/A';
          document.getElementById('bookRating').textContent = data.Rating || 'N/A';
          const fullSummary = data.Summary || 'No summary available.';
          const previewLength = 50; // Number of words to preview
          const words = fullSummary.split(' ');

          const bookSummary = document.getElementById('bookSummary');
          const toggleBtn = document.getElementById('toggleSummaryBtn');

    if (words.length > previewLength) {
        const preview = words.slice(0, previewLength).join(' ') + '...';
        bookSummary.textContent = preview;
        toggleBtn.style.display = 'inline'; // Show the toggle button

        let expanded = false;

        toggleBtn.addEventListener('click', () => {
          if (expanded) {
            bookSummary.textContent = preview;
            toggleBtn.textContent = 'View More';
          } else {
            bookSummary.textContent = fullSummary;
            toggleBtn.textContent = 'View Less';
          }
          expanded = !expanded;
        });
      } else {
        bookSummary.textContent = fullSummary;
    }

          document.getElementById('bookPrice').textContent = data.Price ? parseFloat(data.Price).toFixed(2) : 'N/A';
          document.getElementById('bookPages').textContent = data.Pages || 'N/A';
          document.getElementById('bookFormat').textContent = data.Format || 'Unknown Format';
          document.getElementById('bookGenres').textContent = data.Genres || 'N/A';
          document.getElementById('bookAwards').textContent = data.Awards || 'N/A';
          document.getElementById('bookISBN').textContent = data.ISBN || 'N/A';

          const coverURL = data.ISBN
            ? `https://covers.openlibrary.org/b/isbn/${data.ISBN}-L.jpg`
            : 'covers/placeholder.png';
          document.getElementById('bookCover').src = coverURL;

          document.getElementById('addToCart').disabled = false;

          document.getElementById('addToCart').addEventListener('click', () => {
            fetch('add_to_cart.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
              },
              body: JSON.stringify({
                isbn: data.ISBN || '',
                quantity: 1
              })
            })
            .then(response => response.json())
            .then(result => {
              if (result.success) {
                const messageContainer = document.getElementById('messageContainer');
                messageContainer.innerHTML = `
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>${data.Title || 'Book'}</strong> added to cart!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                `;
              } else {
                throw new Error(result.error || 'Failed to add to cart');
              }
            })
            .catch(error => {
              const messageContainer = document.getElementById('messageContainer');
              messageContainer.innerHTML = `
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Error: ${error.message}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              `;
            });
          });

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

});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
