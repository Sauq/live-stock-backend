<?php

$username = $_POST['email'];
$password = $_POST['pass'];
$address = $_POST['address'];

// echo "username: ", $username,"<br>";
// echo "pass: ", $password,"<br>";
// echo "address: ", $address,"<br>";



function hashedItem($hash) {
    return hash("sha256", $hash);
}

function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

$emailHash = hashedItem($username);
$passwordHash = hashPassword($password); //more secure hashing function
$addressHash = hashedItem($address);


//TESTING
//  $var = hashedItem("test");

//  if($var == hashedItem("test")) {
//      echo "MATCHES <br>";
//  }

//  $test = hashPassword("test");

//  if (password_verify("test", $test)) {
//     echo "correct pass";
//  }






#http://localhost/backend-stock-system/live-stock-backend/


?>



