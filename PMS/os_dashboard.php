<?php
session_start();
if ($_SESSION['role'] !== 'OS') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OS Dashboard</title>
</head>
<body>
    <h1>Welcome, OS!</h1>
    <p>This is the dashboard for OS (Office Superintendent).</p>
    <!-- Add more OS-specific content here -->
</body>
</html>
