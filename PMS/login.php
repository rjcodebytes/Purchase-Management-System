<?php
session_start();
include 'config.php'; // Ensure this file contains your database connection

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM super_admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();

        // Directly compare the plain-text password with the stored password
        if ($password === $admin['password']) {
            // Successful login for Super Admin
            $_SESSION['admin'] = $admin['username'];
            $_SESSION['role'] = $admin['role']; // Store role in session
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        // Check for other roles (HOD, OS, Registrar, Principal)
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Compare plain-text password with stored password
            if ($password === $user['password']) {
                // Successful login for users with roles
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role']; // Store role in session

                // Redirect based on the role
                switch ($user['role']) {
                    case 'HOD':
                        header("Location: hod_dashboard.php");
                        break;
                    case 'OS':
                        header("Location: os_dashboard.php");
                        break;
                    case 'Registrar':
                        header("Location: registrar_dashboard.php");
                        break;
                    case 'Principal':
                        header("Location: principal_dashboard.php");
                        break;
                    default:
                        echo "Invalid role.";
                        exit();
                }
                exit();
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "No user found with this username.";
        }
        $stmt->close();
    }
}
?>
