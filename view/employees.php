<!doctype html>
<?php
	session_start();

	if(empty($_SESSION['USER'])){
		header('Location: ../index.php');
		exit();
	}; 

	$db =  new mysqli("localhost", "brubru", "hahamdp!123", "test");

	$stock_query = "SELECT * FROM users";
	$result = mysqli_query($db, $stock_query);
	$listitems;

	while($item = $result->fetch_object()){
		$listitems[$item->id] = $item;
	}
?>



<html lang="en">
  <head>
	<title>Employee</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/datatables.min.css"/>

	<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
  </head>
  <body class="d-flex flex-column h-100">
  <main role="main" class="flex-shrink-0">
  <div class="container">
		<div class="row justify-content-center">
			<div class="col-12 title">
				<div class="row">
					<div class="col-8">
						<h1 class="title-text"> Employees </h1>
					</div>
					<div class="col-2">
						<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add employee</button>
					</div>
					<div class="col-1">
						<button class="btn btn-primary shadow-2 mb-4" onclick="location.href='home.php'">Home</button>
					</div>
					<div class="col-1">
						<button class="btn btn-primary shadow-2 mb-4" onclick="location.href='../logout.php'">Logout</button>
					</div>
				</div>
				<hr>
			</div>
			<div class="col-12 content-stock">
				<div class="row align-items-center">
					<div class="col-12">
						<table id="employees-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
							<thead>
								<tr>
									<th>Username</th>
									<th>Email</th>
									<th>Role</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($listitems as $employee) { ?>
								<tr>
									<td> <?= $employee->username ?> </td>
									<td> <?= $employee->email ?> </td>
									<td> <?= $employee->role ?> </td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
	<footer class="footer mt-auto py-3">
  <div class="container">
	<span class="text-muted">&copy 2020 - ERP Cyber</span>
  </div>
</footer>

<div id="myModal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
		<div class="modal-content">
	  		<div class="modal-header">
				<h5 class="modal-title">Add Employee</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  			<span aria-hidden="true">&times;</span>
				</button>
	  		</div>
			<form>
			<div class="modal-body">
				<div class="form-group">
					<label for="username-input">Username</label>
					<input type="text" class="form-control" id="username-input" required>
				</div>
				<div class="form-group">
					<label for="email-input">Email</label>
					<input type="email" class="form-control" id="email-input" required>
				</div>
				<div class="form-group">
					<label for="password1-input">Password</label>
					<input type="password" class="form-control" id="password1-input" required>
				</div>
				<div class="form-group">
					<label for="password2-input">Confirm Password</label>
					<input type="password" class="form-control" id="password2-input" required>
				</div>
				<div class="form-group">
					<label for="role-input">Select role</label>
					<select class="form-control" id="role-input" required>
						<option value="admin">Admin</option>
						<option value="user" selected>User</option>
					</select>
				</div>
	  		</div>
	  		<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="add-user">Add</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	  		</div>
			</form>
		</div>
  	</div>
</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../js/datatables.min.js"></script>
	<script type="text/javascript" src="../js/datatable.js"></script>
	<script type="text/javascript" src="../js/employee.js"></script>
</body>
</html>