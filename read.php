<?php
require 'db.php';
$sql = 'SELECT * FROM Employees';
$statement = $pdo->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Employees</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Employees</h2>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Action</th>
        </tr>
        <?php foreach($employees as $employee): ?>
            <tr>
                <td><?= $employee->id; ?></td>
                <td><?= $employee->name; ?></td>
                <td><?= $employee->email; ?></td>
                <td><?= $department->id; ?></td>
                <td>
                    <a href="update.php?id=<?= $employee->id ?>" class="btn btn-info">Edit</a>
                    <a href="delete.php?id=<?= $employee->id ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>

