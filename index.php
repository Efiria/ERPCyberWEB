<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/styles.css"/>

	<title>Login</title>
</head>

<?php
    session_start();

    if(isset($_SESSION['USER'])){
        header('Location: ./view/home.php');
        exit();
    }; 
?>

<body>
	<div class="container container-login">
		<div class="row justify-content-center align-items-center">
			<form class="col-12">
				<div class="form-group">
					<h3>ERP Cyber Web</h3>
				</div>
				<div class="form-group">
                    <br>
					<label for="username-text">Email</label>
					<input type="text" class="form-control" id="username-input" placeholder="Email" required>
				</div>
				<div class="form-group">
					<label for="password-input">Password</label>
					<input type="password" class="form-control" id="password-input" placeholder="Password" required>
				</div>
				<div class="form-group">
					<div class="button-right">
						<input type="button" class="btn btn-primary shadow-2 mb-4" id="login" value="Login">
					</div>
				</div>
			</form>   
		</div>
	</div>
</body>

<footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>*
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/login.js"></script>

</footer>
</html>