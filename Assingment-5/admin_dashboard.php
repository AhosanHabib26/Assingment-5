<?php
session_start();

if ($_SESSION['role'] !== 'admin') {
    header('Location: login.php'); // Redirect non-admins
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?> (Admin)</h2>
    <!-- Your role management interface here -->
</body>
</html>
