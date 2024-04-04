<?php
session_start();

include 'includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT users.*, personal_information.username, personal_information.photo 
            FROM users 
            INNER JOIN personal_information 
            ON users.username = personal_information.username 
            WHERE email = '$email' AND password = '$password'";
    
    echo "SQL Query: " . $sql . "<br>";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['photo'] = $user['photo'];

            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: login.php?error=1");
            exit();
        }
    } else {
        echo "Error: " . mysqli_error($conn);
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>