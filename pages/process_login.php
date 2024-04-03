<?php
session_start();

// Include connection.php to establish database connection
include 'includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user inputs
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL query to fetch user from database
    $sql = "SELECT users.*, personal_information.username, personal_information.photo 
            FROM users 
            INNER JOIN personal_information 
            ON users.username = personal_information.username 
            WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            // User found, fetch user data
            $user = mysqli_fetch_assoc($result);

            // Store user data in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['photo'] = $user['photo'];

            // Redirect to dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            // User not found, redirect back to login page
            header("Location: login.php?error=1");
            exit();
        }
    } else {
        // SQL query execution failed
        echo "Error: " . mysqli_error($conn);
        exit();
    }
} else {
    // Redirect back to login page if accessed directly
    header("Location: login.php");
    exit();
}
?>
