<!doctype html>
<?php
    session_start();

    if(empty($_SESSION['USER'])){
        header('Location: ../index.php');
        exit();
    }; 

    $db = mysqli_connect('localhost', 'root', '', 'test');

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
    <script type="text/javascript" src="../js/datatable.js"></script>
</body>
</html>