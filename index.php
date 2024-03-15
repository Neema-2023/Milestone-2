<!DOCTYPE html>
<html>
<head>
    <title>CST323 HRMS</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>Welcome to CST323 HRMS</h1>
    <div class="login-form">
        <h2>Class Login</h2>
        <form action="authenticate.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <hr>
    
    <a href="create.php" class="btn btn-primary">Add Employee</a>
    <a href="read.php" class="btn btn-secondary">View Employee</a>
</div>
</body>
</html>
