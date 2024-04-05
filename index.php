<!DOCTYPE html>
<html>
<head>
    <title>CST323 HRMS</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <div class="container mt-3"><h2>Training Schedule</h2>
<a href="home.php" class="btn btn-primary mb-2">Go Home</a>

<a href="create.php" class="btn btn-primary mb-2">Add New Training</a>

<table class="table"><thead><tr><th>Employee Name</th><th>Training Class</th><th>Date</th><th>Actions</th></tr></thead><tbody>

foreach ($trainings as $training) {
     "<tr><td>{$training['employeeName']}</td><td>{$training['trainingClass']}</td><td>{$training['trainingDate']}</td>
          <td><a href='update.php?id={$training['id']}' class='btn btn-warning'>Edit</a>
          <a href='delete.php?id={$training['id']}' class='btn btn-danger'>Delete</a></td></tr>";
}

</tbody></table></div>
?>
