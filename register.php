<?php
require 'db.php';
$sql = 'SELECT * FROM Employees';
$statement = $pdo->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRMS Registration</title>
</head>
<body>
    <h2>HRMS Registration</h2>
    <form action="register.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="department">Department:</label>
        <input type="text" id="department" name="department" required><br><br>
        
        <label for="position">Position:</label>
        <input type="text" id="position" name="position" required><br><br>
        
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.html">Login here</a>.</p>
</body>
</html>

