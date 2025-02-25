<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card p-4 shadow-lg text-center" style="width: 50rem;">
        <img src="<?php echo htmlspecialchars($user["profile_picture"]); ?>" class="rounded-circle border shadow-sm" width="120">
        <h2 class="mt-3">Welcome, <?php echo htmlspecialchars($user["name"]); ?>! 🎉</h2>
        <p class="text-muted">You are now logged in. Enjoy your session!</p>
        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>
</body>
</html>
