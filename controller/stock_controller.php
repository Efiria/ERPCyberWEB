<?php

session_start();

$product=$_POST['product'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];

$mysqli = new mysqli("localhost", "brubru", "hahamdp!123", "test");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL  : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->query("INSERT INTO stocks (product,price,quantity) VALUES ('$product','$price','$quantity') ")) {
    echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "success";
}
?>