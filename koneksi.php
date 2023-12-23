<?php
$servername = "localhost";
$dbname = "db_users";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>
