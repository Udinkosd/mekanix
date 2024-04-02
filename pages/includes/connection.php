<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "emekanix";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
