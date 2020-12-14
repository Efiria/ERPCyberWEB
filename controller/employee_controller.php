<?php

session_start();


$username=$_POST['username'];
$email=$_POST['email'];
$role=$_POST['role'];
$password=$_POST['password1'];

$hashed = md5($password);

$mysqli = new mysqli("localhost", "brubru", "hahamdp!123", "test");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL  : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->query("INSERT INTO users (username,email,password_web,role) VALUES ('$username','$email','$hashed','$role') ")) {
    echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "success";
}
?>