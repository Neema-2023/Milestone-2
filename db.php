<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:neemalocalhost.database.windows.net,1433; Database = cloud_test_db", "Neema", "{Cleburne@@137}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "Neema", "pwd" => "{Cleburne@@137}", "Database" => "cloud_test_db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:neemalocalhost.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
