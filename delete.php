<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];

    $delete_query = "DELETE FROM tbl_users WHERE id = $user_id";

    if (mysqli_query($conn, $delete_query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>