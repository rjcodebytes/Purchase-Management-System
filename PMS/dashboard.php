<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['create_user'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password
    $role = $_POST['role'];

    $sql = "INSERT INTO users (name, username, password, role) VALUES ('$name', '$username', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "User created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard">
        <h2>Welcome, Super Admin</h2>
        <form action="create_user.php" method="post">
            <h3>Create New User</h3>
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role" required>
                <option value="HOD">HOD</option>
                <option value="OS">OS</option>
                <option value="Registrar">Registrar</option>
                <option value="Principal">Principal</option>
            </select>
            <button type="submit" name="create_user">Create User</button>
        </form>
    </div>
</body>
</html>
