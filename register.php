<?php
require_once "user.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $profile_picture = "uploads/default.png";
    if (!empty($_FILES["profile_picture"]["name"])) {
        $target_dir = "uploads/";
        $profile_picture = $target_dir . basename($_FILES["profile_picture"]["name"]);
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $profile_picture);
    }

    if ($user->register($name, $email, $password, $profile_picture)) {
        echo "<div class='alert alert-success'>Registration successful. <a href='index.php'>Login here</a></div>";
    } else {
        echo "<div class='alert alert-danger'>Registration failed.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 25rem;">
        <h3 class="text-center">Register</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Profile Picture</label>
                <input type="file" name="profile_picture" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
            <p class="mt-3 text-center"><a href="index.php">Already have an account? Login</a></p>
        </form>
    </div>
</body>
</html>
