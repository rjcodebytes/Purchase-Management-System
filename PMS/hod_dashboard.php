<?php
session_start();
if ($_SESSION['role'] !== 'HOD') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOD Dashboard</title>
</head>
<body>
    <h1>Welcome, HOD!</h1>
    <p>This is the dashboard for the Head of Department (HOD).</p>
    <!-- Add more HOD-specific content here -->
</body>
</html>
