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
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Home</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="d-flex ms-auto me-2" role="search" id="searchForm">
        <input class="form-control me-2" type="search" placeholder="Search" id="searchInput">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h1 class="mb-4">Your Shopping Cart</h1>

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
          <button class="btn btn-primary w-100">Proceed to Checkout</button>
          <div class="text-center mt-3">
            <a href="index.php" class="btn btn-link">Continue Shopping</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function renderCart() {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  const tbody = document.querySelector("tbody");
  const subtotalSpan = document.querySelector("#subtotal");
  const taxSpan = document.querySelector("#tax");
  const totalSpan = document.querySelector("#total");

  tbody.innerHTML = "";
  let subtotal = 0;

  cart.forEach((item, index) => {
    const itemPrice = parseFloat(item.price) || 0; // 🛠 Get REAL price from cart
    const itemTotal = itemPrice * item.quantity;
    subtotal += itemTotal;

    const coverURL = item.isbn
      ? `https://covers.openlibrary.org/b/isbn/${item.isbn}-S.jpg`
      : 'https://via.placeholder.com/50?text=No+Cover';

    const row = document.createElement("tr");
    row.innerHTML = `
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <img src="${coverURL}" alt="Book Cover" class="me-3" style="width: 50px; height: auto;" onerror="this.src='https://via.placeholder.com/50?text=No+Cover'">
            <div>
              <h6 class="mb-0">${item.title}</h6>
              <small class="text-muted">By ${item.author}</small><br>
              <small class="text-muted">Format: ${item.format ?? 'Unknown Format'}</small>
            </div>
          </div>
        </td>
        <td>$${itemPrice.toFixed(2)}</td>
        <td>
          <div class="input-group" style="width: auto; min-width: 120px;">
            <button class="btn btn-outline-secondary px-2" onclick="updateQuantity(${index}, -1)">-</button>
            <input type="text" class="form-control text-center" value="${item.quantity}" readonly style="width: 50px; min-width: 0; padding: 6px 8px; font-size: 1rem;">
            <button class="btn btn-outline-secondary px-2" onclick="updateQuantity(${index}, 1)">+</button>
          </div>
        </td>
        <td>$${itemTotal.toFixed(2)}</td>
        <td>
          <button class="btn btn-outline-danger btn-sm" onclick="removeItem(${index})">🗑️</button>
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

function updateQuantity(index, change) {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart[index].quantity += change;
  if (cart[index].quantity <= 0) {
    cart.splice(index, 1);
  }
  localStorage.setItem('cart', JSON.stringify(cart));
  renderCart();
}

function removeItem(index) {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.splice(index, 1);
  localStorage.setItem('cart', JSON.stringify(cart));
  renderCart();
}

renderCart();

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
