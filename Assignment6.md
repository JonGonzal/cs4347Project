# Assignment 6: SQL Injection

## A. SELECT

On the Login form of `auth.php`, to login under the username `awilley2`, input `awilley2' OR 1=1 #` in the username field and anything in the password field. This allows you to log in as the user and see additional information about them (name and email).

## B. UPDATE

On the Forgot Password form of `auth.php`, to change the password of the user `awilley2` without knowing their email, input `' OR username = 'awilley2' #` and the desired password in the password field. This resets the password, and you can now log in with the new password on the login page (and see the change reflected in the database).

## C. Prepared Statement Technique

Try the trick from part (A) on the `auth_safe.php` instead - it no longer works.
