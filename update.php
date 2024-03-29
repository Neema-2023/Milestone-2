<?php
require 'db.php';

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Employee ID not found.');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    $sql = "UPDATE employees SET name = ?, email = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    if($stmt->execute([$name, $email, $id])) {
        header("Location: read.php");
    } else {
        echo "Error updating record.";
    }
} else {
    $sql = "SELECT * FROM employees WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    $user = $stmt->fetch(PDO::FETCH_OBJ);

    if(!$employee) {
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Edit Employee</h2>
    <form action="update.php?id=<?= $employee->id ?>" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($employee->name, ENT_QUOTES); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($employee->email, ENT_QUOTES); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>


