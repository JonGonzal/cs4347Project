<?php
if (session_status() === PHP_SESSION_NONE){
  session_start();
}
?>

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

