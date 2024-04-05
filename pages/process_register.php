<?php
session_start();

include 'includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $repeatPassword = trim($_POST['repeatpassword']);
    $termsAgreed = isset($_POST['terms-and-conditions'])? 1 : 0; // Check if the terms checkbox is checked
    $role = trim($_POST['role']); // Get the role from the hidden input field

    // Check if the terms checkbox is checked
    if (!$termsAgreed) {
        header("Location: register.php?error=You must agree to the terms and conditions");
        exit();
    }

    // Check if passwords match
    if ($password!== $repeatPassword) {
        header("Location: register.php?error=Passwords do not match");
        exit();
    }

    // Check if email already exists
    $checkEmailQuery = $conn->prepare("SELECT * FROM users WHERE email =?");
    $checkEmailQuery->bind_param("s", $email);
    $checkEmailQuery->execute();
    $checkEmailResult = $checkEmailQuery->get_result();

    if ($checkEmailResult->num_rows > 0) {
        header("Location: register.php?error=Email already exists");
        exit();
    }

    // Insert new user into the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $insertUserQuery = $conn->prepare("INSERT INTO users (email, name, role, hashed_password) VALUES (?,?,?,?)");
    $insertUserQuery->bind_param("ssss", $email, $_POST['name'], $role, $hashedPassword);
    $insertUserQuery->execute();

    if ($insertUserQuery->affected_rows > 0) {
        header("Location: login.php?success=Registration successful. Please login.");
        exit();
    } else {
        echo "Error: ". $conn->error;
        exit();
    }
} else {
    header("Location: register.php");
    exit();
}
?>