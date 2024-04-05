<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employeeName = $_POST['employeeName'];
    $department = $_POST['department'];
    $trainingClass = $_POST['trainingClass'];
    $trainingDate = $_POST['trainingDate'];

    $logger->info('Adding employee to training session');
    // Error handling here?
    $service->addTraining($employeeName, $department, $trainingClass, $trainingDate);
    
    $logger->info('Employee added successfully');
    header("Location: index.php");
    exit();
 } catch (Exception $e) {
        $errorMessage = "Error adding training: " . $e->getMessage();
        $logger->error($errorMessage);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Training Session</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Add Training Session</h2>
    <?php if ($errorMessage): ?>
        <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($errorMessage) ?>
        </div>
    <?php endif; ?>
    <form method="POST" action="add_employee.php">
        <div class="form-group">
            <label>Employee Name</label>
            <input type="text" name="employeeName" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Department</label>
            <input type="text" name="department" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Training Class</label>
            <select name="trainingClass" class="form-control" required>
                <option>Anger Management</option>
                <option>Security</option>
                <option>Phishing</option>
            </select>
        </div>
        <div class="form-group">
            <label>Training Date</label>
            <input type="date" name="trainingDate" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Training</button>
    </form>
</div>
</body>
</html>
