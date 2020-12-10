<?php

$db = mysqli_connect('localhost', 'root', '', 'test');


$email=$_POST['email'];
$password=$_POST['password'];

$user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if(!$user){

	$hashed = md5($password);
	echo $hashed;

}
?>