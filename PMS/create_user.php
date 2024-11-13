<?php
session_start();
include 'config.php'; // Ensure you have the correct database connection

// Check if user is logged in as Super Admin
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}

if (isset($_POST['create_user'])) {
    // Collect user input from the form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Simple validation
    if (empty($name) || empty($username) || empty($password) || empty($role)) {
        echo "All fields are required.";
        exit();
    }

    // Prevent SQL Injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if username already exists
    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose another one.";
        exit();
    }

    // Insert the new user into the database
    $stmt = $conn->prepare("INSERT INTO users (name, username, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $username, $password, $role);

    if ($stmt->execute()) {
        echo "User created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
