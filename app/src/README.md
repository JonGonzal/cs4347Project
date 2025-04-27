# Lemma Bookstore - CS4347 Project

This is an educational bookstore project built with PHP, MySQL, JavaScript, and Bootstrap.

The project includes login/signup functionality, a book catalog, book detail pages, a shopping cart (using localStorage), and a basic search system.

## 📚 Tech Stack

- PHP 8.x
- MySQL 8.x
- Bootstrap 5
- JavaScript (ES6)
- HTML5 / CSS3
- phpMyAdmin (for database management)
- XAMPP (local development environment)

---

## 📦 Installation Guide

### 1. Install XAMPP

- Download and install XAMPP from: [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html)

Make sure you install the version that includes:
- Apache
- MySQL
- phpMyAdmin

---

### 2. Place the Project Folder

- Open the XAMPP installation directory: C:\xampp\htdocs\

- Copy and paste this entire project folder into `htdocs/`.

- **Important:**  
Rename the project folder to: lemma-bookstore

Final path should look like: C:\xampp\htdocs\lemma-bookstore\


---

### 3. Start XAMPP Services

- Open **XAMPP Control Panel**.
- Start the following modules:
  - ✅ Apache (Start)
  - ✅ MySQL (Start)

Both should turn **green** if they are running correctly.

---

### 4. Create the Database

- Go to your web browser and open: http://localhost/phpmyadmin/

- Click **New** on the left sidebar.

- Create a new database named: lemma_books

**Important:** Use **Collation** set to `utf8mb4_general_ci` (default).

---

### 5. Import the Database Structure

- Inside phpMyAdmin, click the `lemma_books` database you just created.
- Click the **Import** tab.
- Choose the file: lemma_database.sql


- Press **Go** to import.

✅ Now all the tables, books, and initial data will be loaded into your database.

---

### 6. Configure Database Connection (if needed)

- Open the file: db.php

- Make sure these database settings match your local XAMPP setup:

```php
$host = 'localhost';
$db   = 'lemma_books';
$user = 'root';
$pass = ''; // usually empty password in XAMPP

### 7. Launch the Project

- In your web browser, go to: http://localhost/lemma-bookstore/auth.php

✅ You will see the **Login / Sign Up page** first.

✅ After logging in successfully, you will be redirected to the homepage.