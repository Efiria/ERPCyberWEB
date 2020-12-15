<!doctype html>
<?php
    session_start();

    if(empty($_SESSION['USER'])){
        header('Location: ../index.php');
        exit();
    }; 

    $db =  new mysqli("localhost", "brubru", "hahamdp!123", "test");

    $stock_query = "SELECT * FROM stocks";
    $result = mysqli_query($db, $stock_query);
    $listitems;

    while($item = $result->fetch_object()){
        $listitems[$item->id] = $item;
    }
?>



<html lang="en">
  <head>
    <title>Stock</title>
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
                    <div class="col-10">
                        <h1 class="title-text"> Stock </h1>
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
                        <table id="stock-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listitems as $product) { ?>
                                <tr>
                                    <td> <?= $product->product ?> </td>
                                    <td> <?= $product->price ?> </td>
                                    <td> <?= $product->quantity ?> </td>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../js/datatables.min.js"></script>
    <script type="text/javascript" src="../js/datatable.js"></script>
</body>
</html>