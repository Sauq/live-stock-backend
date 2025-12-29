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

    $stmt = $pdo->query("SELECT * FROM productstb WHERE expired=1");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<script>";
    echo "window.products = " . json_encode($products) . ";";
    echo "</script>";

}

function grabProductid($productname) {
    global $pdo;

    $stmt = $pdo->prepare("SELECT productid FROM productstb WHERE name = ?");
    $stmt->execute([$productname]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['productid'];
}


function purchaseComplete($email, $name, $address, $price, $productid ) {
    global $pdo;

    //Add it into orders
    $stmt = $pdo->prepare("
        INSERT INTO ordersTb (productid, fullname, email, shippingaddress, priceatpurchase)
        VALUES (?, ?, ?, ?, ?)
    ");
    $stmt->execute([$productid, $name, $email, $address, $price]);

    //Change the expirey value of product so it doesnt show once purchased
    $stmt2 = $pdo->prepare("UPDATE productstb SET expired = 0 WHERE productid = ?");
    $stmt2->execute([$productid]);

}