<!doctype html>
<?php
    session_start();

    if(empty($_SESSION['USER'])){
        header('Location: ../index.php');
        exit();
    }; 
?>



<html lang="en">
  <head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
  </head>
  <body class="d-flex flex-column h-100">
  <main role="main" class="flex-shrink-0">
  <div class="container">
		<div class="row justify-content-center">
            <div class="col-12 title">
                <div class="row">
                    <div class="col-11">
                        <h1 class="title-text"> ERP Cyber Web </h1>
                    </div>
                    <div class="col-1">
                        <button class="btn btn-primary shadow-2 mb-4" onclick="location.href='../logout.php'">Logout</button>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-12 content-home">
                <div class="row align-items-center">
                    <div class="col-3">
                        <a href="stock.php" class="tile stock">
                            <h3 class="title">Stock</h3>
                        </a>
                    </div>
                    <div class="col-3">
                    <a href="customers.php" class="tile customer">
                            <h3 class="title">Customers</h3>
                        </a>
                    </div>
                    <div class="col-3">
                    <a href="orders.php" class="tile orders">
                            <h3 class="title">Orders</h3>
                        </a>
                    </div>
                    <div class="col-3">
                    <a href="employees.php" class="tile employees">
                            <h3 class="title">Employees</h3>
                        </a>
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>