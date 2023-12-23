<?php
require 'koneksi.php';

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query_sql = "INSERT INTO tbl_users (fullname, username, email, password) VALUES ('$fullname', '$username', '$email', '$password')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: login.html");
    exit(); 
} else {
    echo "Pendaftaran Gagal: " . mysqli_error($conn);
}
?>