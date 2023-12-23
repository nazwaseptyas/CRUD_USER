<?php
require 'koneksi.php';

$user_id = $_POST['user_id'];
$edit_fullname = $_POST['edit_fullname'];
$edit_username = $_POST['edit_username'];
$edit_email = $_POST['edit_email'];

$update_query = "UPDATE tbl_users SET fullname=?, username=?, email=? WHERE id=?";
$stmt = mysqli_prepare($conn, $update_query);

mysqli_stmt_bind_param($stmt, "sssi", $edit_fullname, $edit_username, $edit_email, $user_id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php");
    exit();
} else {
    echo "Error updating user: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>