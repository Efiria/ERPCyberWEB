<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	
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
<	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="./js/login.js"></script>

</footer>
</html>