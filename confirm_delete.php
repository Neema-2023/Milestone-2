<?php
require 'db.php';

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: User ID not found.');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    if($stmt->execute([$id])) {
        header("Location: read.php");
    } else {
        echo "Error deleting record.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirm Delete</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Confirm Delete</h2>
    <form action="confirm_delete.php?id=<?= $id ?>" method="post">
        <p>Are you sure you want to delete this user?</p>
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="read.php" class="btn btn-secondary">No, Cancel</a>
    </form>
</div>
</body>
</html>
