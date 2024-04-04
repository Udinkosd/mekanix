<?php
include 'includes/connection.php';

// Get the image ID from the URL parameter
$imageId = isset($_GET['image_id']) ? (int)$_GET['image_id'] : 1;

// Prepare the SQL query to fetch the image based on the image ID
$sql = "SELECT image_file FROM images WHERE image_id = $imageId";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    // Fetch the image data
    $row = mysqli_fetch_assoc($result);
    $imageData = $row['image_file'];

    // Output the <img> tag with the correct src attribute
    echo "It works";
    
    // echo "<img src='data:image/jpeg;base64," . base64_encode($imageData) . "' alt='Image' />";
} else {
    // If no image is found, display a default image
    echo "<img src='/assets/img/default.jpg' alt='Default Image' />";
}

// Close the database connection
mysqli_close($conn);
?>