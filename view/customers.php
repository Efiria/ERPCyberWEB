<!doctype html>
<?php
    session_start();

    if(empty($_SESSION['USER'])){
        header('Location: ../index.php');
        exit();
    }; 

    $db =  new mysqli("localhost", "brubru", "hahamdp!123", "test");

    $stock_query = "SELECT * FROM customer";
    $result = mysqli_query($db, $stock_query);
    $listitems;

    while($item = $result->fetch_object()){
        $listitems[$item->id] = $item;
    }
?>



<html lang="en">
  <head>
    <title>Customers</title>
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
						<h1 class="title-text"> Customers </h1>
					</div>
					<div class="col-2">
						<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add customer</button>
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
                        <table id="customers-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listitems as $customer) { ?>
                                <tr>
                                    <td> <?= $customer->Name ?> </td>
                                    <td> <?= $customer->LastName ?> </td>
                                    <td> <?= $customer->Address ?> </td>
                                    <td> <?= $customer->Country ?> </td>
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
				<h5 class="modal-title">Add Customer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  			<span aria-hidden="true">&times;</span>
				</button>
	  		</div>
			<form>
			<div class="modal-body">
				<div class="form-group">
					<label for="firstname-input">Firstname</label>
					<input type="text" class="form-control" id="firstname-input" required>
				</div>
				<div class="form-group">
					<label for="lastname-input">Lastname</label>
					<input type="text" class="form-control" id="lastname-input" required>
				</div>
				<div class="form-group">
					<label for="address-input">Address</label>
					<input type="text" class="form-control" id="address-input" required>
				</div>
				<div class="form-group">
					<label for="country-input">Country</label>
					<input type="text" class="form-control" id="country-input" required>
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
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../js/datatables.min.js"></script>
    <script type="text/javascript" src="../js/datatable.js"></script>
	<script type="text/javascript" src="../js/customer.js"></script>

</body>
</html>