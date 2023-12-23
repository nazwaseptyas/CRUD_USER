<?php
require 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query_sql = "SELECT password FROM tbl_users WHERE email = ?";
$stmt = mysqli_prepare($conn, $query_sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $hashedPassword = $row['password'];

    if (password_verify($password, $hashedPassword)) {
        header("Location: index.php");
        exit();
    }
}

echo '<center><h4>Email dan password anda salah. Silahkan masukkan data anda kembali dengan benar</h4>
<button><a href="login.html">Login</a></button></center>';
?>