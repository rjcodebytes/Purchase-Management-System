<?php
session_start();
if ($_SESSION['role'] !== 'Principal') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal Dashboard</title>
</head>
<body>
    <h1>Welcome, Principal!</h1>
    <p>This is the dashboard for the Principal.</p>
    <!-- Add more Principal-specific content here -->
</body>
</html>
