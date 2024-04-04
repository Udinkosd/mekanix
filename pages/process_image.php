<?php
include 'includes/connection.php';

session_start();
$_SESSION['user_id'] = 1;

if (isset($_SESSION['user_id'])) {

    $sql = "SELECT image_file FROM images WHERE image_id = 1";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $imagesSrc = $row['image_file'];
    } else {
        echo "Error: ". mysqli_error($conn);
    }
} else {
    $imagesSrc = "/assets/img/default1.jpg";
}

mysqli_close($conn);

?>