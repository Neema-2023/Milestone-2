<?php
//require_once __DIR__ . '/../config/bootstrap.php';
// require_once __DIR__ . '/../vendor/autoload.php';
$logger = require_once __DIR__ . '/../config/bootstrap.php';

$logger->info('User accessed reports.php');

use App\Service\TrainingService;
use App\Repository\TrainingScheduleRepository;

try {
    $db = new mysqli('neemalocalhost.database.windows.net,1433', 'Neema', 'Cleburne$$137', 'HMRS');
    if ($db->connect_error) {
        $logger->info('Connection failed at reports.php');
        throw new Exception("Connection failed: " . $db->connect_error);
    }

    $repository = new TrainingScheduleRepository($db);
    $service = new TrainingService($repository);

    $logger->info('Getting all training reports');
    $trainings = $service->getAllTrainings();
    $logger->info('Got all training reports successfully');
} catch (Exception $e) {
    $logger->info('Error at reports.php: ' . $e->getMessage());
    die('Error: ' . $e->getMessage());
}
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Training Classes Report</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif; /* Change font family */
            color: #333; /* Change text color */
        }
        h2 {
            color: #007bff; /* Change heading color */
        }
        th {
            background-color: #f8f9fa; /* Change table header background color */
        }
        td {
            font-weight: bold; /* Make table data bold */
        }
        .btn-primary {
            background-color: #28a745; /* Change button background color */
            border-color: #28a745; /* Change button border color */
        }
        .btn-primary:hover {
            background-color: #218838; /* Change button background color on hover */
            border-color: #1e7e34; /* Change button border color on hover */
        }
    </style>
</head>
<body>
<div class="container mt-3">
    <h2>Training Classes Report</h2>
    <a href="home.php" class="btn btn-primary mb-2">Go Home</a>
    <table class="table">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Department</th>
                <th>Training Class</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($trainings as $training): ?>
                <tr>
                    <td><?= htmlspecialchars($training['employeeName']) ?></td>
                    <td><?= htmlspecialchars($training['department']) ?></td>
                    <td><?= htmlspecialchars($training['trainingClass']) ?></td>
                    <td><?= htmlspecialchars($training['trainingDate']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
