<?php
require 'db.php';

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: User ID not found.');

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_OBJ);

if(!$user) {
    echo "No user found";
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>User Details</h2>
    <div>
        <p><strong>Name:</strong> <?= htmlspecialchars($user->name, ENT_QUOTES); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user->email, ENT_QUOTES); ?></p>
        <p><strong>Created At:</strong> <?= $user->created_at; ?></p>
    </div>
    <a href="read.php" class="btn btn-primary">Back to Users List</a>
</div>
</body>
</html>
<?php
}
?>
