<?php

$host = "localhost";
$dbname = "dynamicstock";
$username = "root";
$password = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Database connection failed");
}

/**
 * Fetch Products
 */
function grabProducts() {
    global $pdo;

    $stmt = $pdo->query("SELECT * FROM productstb");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<script>";
    echo "window.products = " . json_encode($products) . ";";
    echo "</script>";

}
