<?php

$host = "localhost";
$dbname = "dynamicstock";
$username = "root";
$password = ""; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<script>console.log('Database connection: SUCCESS');</script>";

} catch (PDOException $e) {
    $errorMessage = addslashes($e->getMessage());
    echo "<script>console.error('Database connection FAILED: $errorMessage');</script>";
}

?>
