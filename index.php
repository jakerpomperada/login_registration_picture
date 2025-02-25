<?php
require_once "user.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();

    $email = $_POST["email"];
    $password = $_POST["password"];

    $loggedInUser = $user->login($email, $password);
    if ($loggedInUser) {
        $_SESSION["user"] = $loggedInUser;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Invalid email or password.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login and Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 25rem;">
        <h3 class="text-center">Login</h3>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <p class="mt-3 text-center"><a href="register.php">Don't have an account? Register</a></p>
        </form>
    </div>
</body>
</html>
