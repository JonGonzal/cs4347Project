<?php
require_once 'db.php';
session_start();

$login_error = "";
$signup_error = "";
$signup_success = "";

if (isset($_POST['action']) && $_POST['action'] === 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT CustomerID, password FROM customer WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $row = $result->fetch_assoc()) {
        $_SESSION['user_id'] = $row['CustomerID'];
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    } else {
        $login_error = "Invalid username or password.";
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'signup') {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];


    $sql = "INSERT INTO customer (username, password, fname, lname, email) 
            VALUES ('$username', '$password', '$fname', '$lname', '$email')";

    if ($conn->query($sql) === TRUE) {
        $signup_success = "Account created successfully! You can now log in.";
    } else {
        $signup_error = "Signup failed. Username might be taken.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login / Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f5f5f5;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .card {
      width: 100%;
      max-width: 400px;
      padding: 2rem;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      border-radius: 12px;
      background: #fff;
    }
    .tab-buttons {
      display: flex;
      margin-bottom: 1.5rem;
      border-bottom: 1px solid #ddd;
    }
    .tab-buttons button {
      flex: 1;
      padding: 0.75rem;
      border: none;
      background: none;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }
    .tab-buttons button.active {
      border-bottom: 3px solid #007bff;
      color: #007bff;
    }
    .form-container {
      display: none;
      animation: fadeIn 0.4s ease forwards;
    }
    .form-container.active {
      display: block;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

<div class="card">
  <div class="tab-buttons">
    <button id="loginTab" class="active">Login</button>
    <button id="signupTab">Sign Up</button>
  </div>

  <div id="loginForm" class="form-container active">
    <h3 class="text-center mb-4">Welcome Back!</h3>
    <?php if (!empty($login_error)) echo "<div class='alert alert-danger'>$login_error</div>"; ?>
    <?php if (!empty($signup_success)) echo "<div class='alert alert-success'>$signup_success</div>"; ?>
    <form method="post">
      <input type="hidden" name="action" value="login">
      <div class="mb-3">
        <input type="text" class="form-control" name="username" placeholder="Username" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>

  <div id="signupForm" class="form-container">
    <h3 class="text-center mb-4">Create Account</h3>
    <?php if (!empty($signup_error)) echo "<div class='alert alert-danger'>$signup_error</div>"; ?>
    <form method="post">
      <input type="hidden" name="action" value="signup">
      <div class="mb-3">
        <input type="text" class="form-control" name="username" placeholder="Username" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" name="fname" placeholder="First Name">
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" name="lname" placeholder="Last Name">
      </div>
      <div class="mb-3">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
      </div>
      <button type="submit" class="btn btn-success w-100">Sign Up</button>
    </form>
  </div>
</div>

<script>
  const loginTab = document.getElementById('loginTab');
  const signupTab = document.getElementById('signupTab');
  const loginForm = document.getElementById('loginForm');
  const signupForm = document.getElementById('signupForm');

  loginTab.addEventListener('click', () => {
    loginTab.classList.add('active');
    signupTab.classList.remove('active');
    loginForm.classList.add('active');
    signupForm.classList.remove('active');
  });

  signupTab.addEventListener('click', () => {
    signupTab.classList.add('active');
    loginTab.classList.remove('active');
    signupForm.classList.add('active');
    loginForm.classList.remove('active');
  });

  <?php if (!empty($signup_error)) : ?>
    signupTab.classList.add('active');
    loginTab.classList.remove('active');
    signupForm.classList.add('active');
    loginForm.classList.remove('active');
  <?php endif; ?>
</script>

</body>
</html>

