<?php
session_start();
include 'includes/connection.php';

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Query to fetch the user's personal information and role
$sql = "SELECT u.username, u.email, u.name, u.role, p.photo FROM users u
        LEFT JOIN personal_information p ON u.id = p.id
        WHERE u.id = $user_id";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Check if the user exists
if (mysqli_num_rows($result) > 0) {
    // Redirect to the dashboard.php
    header('Location: dashboard.php');
    exit;
} else {
    echo "User not found.";
}

// Close the database connection
mysqli_close($conn);

?>