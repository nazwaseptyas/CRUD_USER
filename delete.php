<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have sanitized your input data, if not, perform proper validation and sanitization
    $user_id = $_POST['user_id'];

    // Perform the deletion in the database
    $delete_query = "DELETE FROM tbl_users WHERE id = $user_id";

    if (mysqli_query($conn, $delete_query)) {
        // Redirect back to the user list after successful deletion
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>