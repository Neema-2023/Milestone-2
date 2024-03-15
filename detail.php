<?php
require 'db.php';

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Employee ID not found.');

$sql = "SELECT * FROM Employees WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_OBJ);

if(!$employee) {
    echo "No Employee found";
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employees Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Employees Details</h2>
    <div>
        <p><strong>Name:</strong> <?= htmlspecialchars($employee->name, ENT_QUOTES); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($employee->email, ENT_QUOTES); ?></p>
        <p><strong>Employee:</strong> <?= htmlspecialchars($employee->id, ENT_QUOTES); ?></p>
        <p><strong>Created At:</strong> <?= $employee->created_at; ?></p>
    </div>
    <a href="read.php" class="btn btn-primary">Back to Employee List</a>
</div>
</body>
</html>
<?php
}
?>
