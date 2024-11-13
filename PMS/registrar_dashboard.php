<?php
session_start();
if ($_SESSION['role'] !== 'Registrar') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Dashboard</title>
</head>
<body>
    <h1>Welcome, Registrar!</h1>
    <p>This is the dashboard for the Registrar.</p>
    <!-- Add more Registrar-specific content here -->
</body>
</html>
