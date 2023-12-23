<?php
require 'koneksi.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Retrieve user data from the database
    $query_sql = "SELECT * FROM tbl_users WHERE id = $user_id";
    $result = mysqli_query($conn, $query_sql);

    // Check if the user with the specified ID exists
    if ($result && $row = mysqli_fetch_assoc($result)) {
        // Store user data in $user_data array
        $user_data = $row;
    } else {
        echo "User not found";
        exit();
    }

    mysqli_close($conn);
} else {
    echo "Invalid request";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-4">
        <h2>Edit User</h2>
        <form action="edit_user.php" method="POST">
            <input type="hidden" name="user_id" value="<?php echo $user_data['id']; ?>" />
            <div class="mb-3">
                <label for="editFullName" class="form-label">Full Name</label>
                <input type="text" name="edit_fullname" class="form-control" id="editFullName"
                    value="<?php echo $user_data['fullname']; ?>" required />
            </div>
            <div class="mb-3">
                <label for="editUsername" class="form-label">Username</label>
                <input type="text" name="edit_username" class="form-control" id="editUsername"
                    value="<?php echo $user_data['username']; ?>" required />
            </div>
            <div class="mb-3">
                <label for="editEmail" class="form-label">Email address</label>
                <input type="email" name="edit_email" class="form-control" id="editEmail"
                    value="<?php echo $user_data['email']; ?>" required />
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>