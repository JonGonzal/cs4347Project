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
  <title>Shopping Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'header.php';?>

<div class="container mt-4">
  <h1 class="mb-4">Your Shopping Cart</h1>

  <!-- Add Modal -->
  <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="checkoutModalLabel">Thank You For Your Purchase!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <p>Your order has been successfully placed.</p>
        </div>
        <div class="modal-footer justify-content-center">
          <a href="index.php" class="btn btn-primary">Return to Shopping</a>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <!-- Populated by JS -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Order Summary</h5>
          <hr>
          <div class="d-flex justify-content-between mb-2">
            <span>Subtotal</span>
            <span id="subtotal">$0.00</span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span>Shipping</span>
            <span>Free</span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span>Tax</span>
            <span id="tax">$0.00</span>
          </div>
          <hr>
          <div class="d-flex justify-content-between mb-3">
            <strong>Total</strong>
            <strong id="total">$0.00</strong>
          </div>
          <button class="btn btn-primary w-100" id="checkout">Proceed to Checkout</button>
          <div class="text-center mt-3">
            <a href="index.php" class="btn btn-link">Continue Shopping</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="header.js"></script>
<script>
function renderCart() {
  fetch('get_cart.php')
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        const tbody = document.querySelector("tbody");
        const subtotalSpan = document.querySelector("#subtotal");
        const taxSpan = document.querySelector("#tax");
        const totalSpan = document.querySelector("#total");
        const checkoutButton = document.querySelector("#checkout");

        tbody.innerHTML = "";
        let subtotal = 0;

        if (data.items.length === 0) {
          // Cart is empty
          tbody.innerHTML = `
            <tr>
              <td colspan="5" class="text-center py-4">
                <p class="mb-0">Your cart is empty</p>
                <a href="index.php" class="btn btn-primary mt-2">Start Shopping</a>
              </td>
            </tr>
          `;
          checkoutButton.disabled = true;
          checkoutButton.classList.add('btn-secondary');
          checkoutButton.classList.remove('btn-primary');
          checkoutButton.title = 'Your cart is empty';
        } else {
          // Cart has items
          checkoutButton.disabled = false;
          checkoutButton.classList.add('btn-primary');
          checkoutButton.classList.remove('btn-secondary');
          checkoutButton.title = '';

          data.items.forEach((item, index) => {
            const itemPrice = parseFloat(item.Price) || 0;
            const itemTotal = itemPrice * item.Quantity;
            subtotal += itemTotal;

            const coverURL = item.ISBN
              ? `https://covers.openlibrary.org/b/isbn/${item.ISBN}-S.jpg`
              : 'https://via.placeholder.com/50?text=No+Cover';

            const row = document.createElement("tr");
            row.innerHTML = `
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="${coverURL}" alt="Book Cover" class="me-3" style="width: 50px; height: auto;" onerror="this.src='https://via.placeholder.com/50?text=No+Cover'">
                    <div>
                      <h6 class="mb-0">${item.Title}</h6>
                      <small class="text-muted">By ${item.AuthorName}</small><br>
                      <small class="text-muted">Format: ${item.Format ?? 'Unknown Format'}</small>
                    </div>
                  </div>
                </td>
                <td>$${itemPrice.toFixed(2)}</td>
                <td>
                  <div class="input-group" style="width: auto; min-width: 120px;">
                    <button class="btn btn-outline-secondary px-2" onclick="updateQuantity('${item.ISBN}', -1)">-</button>
                    <input type="text" class="form-control text-center" value="${item.Quantity}" readonly style="width: 50px; min-width: 0; padding: 6px 8px; font-size: 1rem;">
                    <button class="btn btn-outline-secondary px-2" onclick="updateQuantity('${item.ISBN}', 1)">+</button>
                  </div>
                </td>
                <td>$${itemTotal.toFixed(2)}</td>
                <td>
                  <button class="btn btn-outline-danger btn-sm" onclick="removeItem('${item.ISBN}')">🗑️</button>
                </td>
              </tr>
            `;
            tbody.appendChild(row);
          });

          const tax = subtotal * 0.08;
          const total = subtotal + tax;
          subtotalSpan.textContent = `$${subtotal.toFixed(2)}`;
          taxSpan.textContent = `$${tax.toFixed(2)}`;
          totalSpan.textContent = `$${total.toFixed(2)}`;
        }
      } else {
        throw new Error(data.error || 'Failed to load cart');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      document.querySelector('.container').innerHTML = `
        <div class="alert alert-danger" role="alert">
          Error loading cart: ${error.message}
        </div>
      `;
    });
}

function updateQuantity(isbn, change) {
  fetch('add_to_cart.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      isbn: isbn,
      quantity: change
    })
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      renderCart();
    } else {
      throw new Error(data.error || 'Failed to update quantity');
    }
  })
  .catch(error => {
    console.error('Error:', error);
    alert('Error updating quantity: ' + error.message);
  });
}

function removeItem(isbn) {
  fetch('add_to_cart.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      isbn: isbn,
      quantity: -999 // This will effectively remove the item
    })
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      renderCart();
    } else {
      throw new Error(data.error || 'Failed to remove item');
    }
  })
  .catch(error => {
    console.error('Error:', error);
    alert('Error removing item: ' + error.message);
  });
}

renderCart();

document.getElementById('searchForm').addEventListener('submit', function(e) {
  e.preventDefault();
  const searchValue = document.getElementById('searchInput').value.trim();
  if (searchValue) {
    window.location.href = `book.php?q=${encodeURIComponent(searchValue)}`;
  }
});

document.getElementById('checkout').addEventListener('click', () => {
  // Clear the cart first
  fetch('clear_cart.php')
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Show the thank you modal
        const checkoutModal = new bootstrap.Modal(document.getElementById('checkoutModal'));
        checkoutModal.show();
      } else {
        throw new Error(data.error || 'Failed to clear cart');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Error during checkout: ' + error.message);
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
