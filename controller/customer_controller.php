<?php

session_start();


$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$address=$_POST['address'];
$country=$_POST['country'];

$mysqli = new mysqli("localhost", "root", "", "test");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL  : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->query("INSERT INTO customer (Name,LastName,Address,Country) VALUES ('$firstname','$lastname','$address','$country') ")) {
    echo "failed: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "success";
}
?>