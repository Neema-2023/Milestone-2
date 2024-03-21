<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $department = $_POST["department"];
    $position = $_POST["position"];

    // Insert new employee data into the database
    // Assuming you have a MySQL database connection
    $conn = new mysqli("tcp:neemalocalhost.database.windows.net,1433", "Neema", "Cleburne@@137", "cloud_test_db");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO employees (name, email, password, department, position) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $password, $department, $position);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Redirect to login page after successful registration
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
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
        
        <input type="submit" value="Register">
    </form>
    <p>Already have an account? <a href="login.html">Login here</a>.</p>
</body>
</html>
