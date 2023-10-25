<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch user data from storage (file or database)
    $users = file('users.txt', FILE_IGNORE_NEW_LINES);

    $email = $_POST['email'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        list($username, $stored_email, $hashed_password) = explode('|', $user);
        if ($email == $stored_email && password_verify($password, $hashed_password)) {
            // Set session data
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'user'; // You may fetch the user's role from a database

            // Redirect to the appropriate page based on the user's role
            if ($_SESSION['role'] == 'admin') {
                header('Location: admin_dashboard.php');
            } else {
                header('Location: user_dashboard.php');
            }
            exit();
        }
    }

    // If login fails, redirect to login page with an error message
    header('Location: login.php?error=1');
    exit();
}
?>
