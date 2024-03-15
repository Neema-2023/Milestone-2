<?php
session_start();
require 'db.php';

$message = '';

if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['username']) && !empty($_POST['password'])) {
    // Dummy credentials for demonstration
    if($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
        $_SESSION['logged_in'] = true;
        header("Location: index.php");
    } else {
        $message = 'Login failed';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Cloud Test App</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <?php if($message != ''): ?>
        <p class="alert alert-danger"><?= $message; ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
</body>
</html>
