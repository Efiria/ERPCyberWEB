<?php


$db = mysqli_connect('localhost', 'root', '', 'test');


$email=$_POST['email'];
$password=$_POST['password'];
$hashed = md5($password);

$user_check_query = "SELECT * FROM users WHERE email='$email' AND password_web='$hashed'";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if($user){

	echo 'logged';
	$_SESSION['USER'] = $user;
}else{
	echo 'user do not exist';
}
?>