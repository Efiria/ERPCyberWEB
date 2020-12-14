<?php

session_start();


$numOrder=$_POST['numOrder'];
$price=$_POST['price'];
$idcustomer=$_POST['idcustomer'];

$mysqli = new mysqli("localhost", "brubru", "hahamdp!123", "test");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL  : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->query("INSERT INTO orders (numOrder,idcustomer,price) VALUES ('$numOrder','$idcustomer','$price') ")) {
    echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "success";
}
?>