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

// session_start();

// include 'includes/connection.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     // Prepare the SQL query to select user information including hashed password
//     $sql = "SELECT users.*, personal_information.username, personal_information.photo, users.hashed_password
//             FROM users 
//             INNER JOIN personal_information 
//             ON users.username = personal_information.username 
//             WHERE email = ?";
    
//     // Prepare the SQL statement
//     $stmt = $conn->prepare($sql);
//     if (!$stmt) {
//         // Error in preparing the SQL statement
//         echo "Error preparing statement: " . $conn->error;
//         exit();
//     }

//     // Bind the email parameter
//     $stmt->bind_param("s", $email);

//     // Execute the statement
//     $success = $stmt->execute();
//     if (!$success) {
//         // Error in executing the SQL statement
//         echo "Error executing statement: " . $stmt->error;
//         exit();
//     }

//     // Get the result
//     $result = $stmt->get_result();
//     if (!$result) {
//         // Error in getting the result
//         echo "Error getting result: " . $stmt->error;
//         exit();
//     }


//     // Check if exactly one row was returned
//     if ($result->num_rows == 1) {
//         // Fetch the user data from the result set
//         $user = $result->fetch_assoc();

//         // Debug information
//         $debug_info = "Entered Password: " . $password . "\n";
//         $debug_info .= "\n"; // Add a line break
//         $debug_info .= "Hashed Password from Database: " . $user['hashed_password'] . "\n";

//         // JavaScript code to display debug information in an alert dialog
//         echo "<script>alert('" . $debug_info . "');</script>";

//         // Verify the entered password against the hashed password
//         if (password_verify($password, $user['hashed_password'])) {
//             // Password is correct, set session variables and redirect to dashboard
//             $_SESSION['id'] = $user['id'];
//             $_SESSION['email'] = $user['email'];
//             $_SESSION['username'] = $user['username'];
//             $_SESSION['name'] = $user['name'];
//             $_SESSION['role'] = $user['role'];
//             $_SESSION['photo'] = $user['photo'];

//             header("Location: dashboard.php");
//             echo "Error getting result: " . $conn->error;
//             exit();
//         } else {
//             // Incorrect password, redirect to login with error
//             header("Location: login.php?error=3");
//             echo "Entered Password: " . $password . "<br>";
//             echo "Hashed Password from Database: " . $user['hashed_password'] . "<br>";
//             echo "Error getting result: " . $conn->error;
//             exit();
//         }
//     } else {
//         // No user found with the provided email, redirect to login with error
//         header("Location: login.php?error=4");
//         echo "Error getting result: " . $conn->error;
//         exit();
//     }

// } else {
//     // Redirect to login page if the request method is not POST and the current page is not login.php
//     if ($_SERVER['PHP_SELF'] != '/login.php') {
//         header("Location: login.php");
//     }
//     echo "Error getting result: " . $conn->error;
//     exit();
// }


?>