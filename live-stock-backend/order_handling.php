<?php
include "db.php";

$success = false;

$email = trim($_POST['email']);
$fullname = trim($_POST['fullname']);
$address = trim($_POST['address']);
$product = trim($_POST['productName']);
$price = trim($_POST['productPrice']);


// echo "email: ", $email,"<br>";
// echo "fullname: ", $fullname,"<br>";
// echo "address: ", $address,"<br>";
// echo "product: ", $product,"<br>";
// echo "price: ", $price,"<br>";

$productid = grabProductid($product);

if(purchaseComplete($email, $fullname, $address, $price, $productid)) {
    $success = true;
}

header("Location: index.php?success=1");
exit;













#http://localhost/backend-stock-system/live-stock-backend/


?>