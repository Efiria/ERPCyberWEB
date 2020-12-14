<!doctype html>
<?php
	session_start();

	if(empty($_SESSION['USER'])){
		header('Location: ../index.php');
		exit();
	}; 

	$db =  new mysqli("localhost", "brubru", "hahamdp!123", "test");

	$stock_query = "SELECT orders.id, orders.numOrder, customer.Name, customer.LastName, customer.Address, customer.Country, orders.price FROM orders LEFT JOIN customer ON orders.idcustomer = customer.id";
	$result = mysqli_query($db, $stock_query);
	$listitems;
	$cp = 0;
	while($item = $result->fetch_object()){
		$cp ++;
		$listitems[$cp] = $item;
	}
	
	$ordersdetail_query = "SELECT * FROM orders_detail LEFT JOIN stocks ON stocks.id = orders_detail.idproduct";
	$resultdetails = mysqli_query($db, $ordersdetail_query);
	$listdetails;
	$cp = 0;
	while($detailitem = $resultdetails->fetch_object()){
		$cp ++;
		$listdetails[$cp] = $detailitem;
	}
	$db->close();
	
?>



<html lang="en">
  <head>
	<title>Orders</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
	
	<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
  </head>
  <body class="d-flex flex-column h-120">
  <main role="main" class="flex-shrink-0">
  <div class="container">
		<div class="row justify-content-center">
			<div class="col-12 title">
				<div class="row">
					<div class="col-8">
						<h1 class="title-text"> Orders </h1>
					</div>
					<div class="col-2">
						<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add order</button>
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
						<table id="orders-table" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>Order Number</th>
									<th>Customer firstname</th>
									<th>Lastname</th>
									<th>Address</th>
									<th>Country</th>
									<th>Order Price</th>
									<th>Details</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($listitems as $order) { ?>
								<tr>
									<td> <?= $order->numOrder ?> </td>
									<td> <?= $order->Name ?> </td>
									<td> <?= $order->LastName ?> </td>
									<td> <?= $order->Address ?> </td>
									<td> <?= $order->Country ?> </td>
									<td> <?= $order->price ?> </td>
									<td style="text-align:center"> <button type="button" class="btn btn-primary show-details" pid="<?= $order->numOrder ?>">+</button> </td>
								</tr>
								<tr class="<?= $order->numOrder ?>-details tableheader" style="display:none" display="hidden">
									<td style="display:none"><?= $order->numOrder ?></td>
									<td> </td>
									<td> </td>
									<td style="font-weight: bold">Product  </td>
									<td style="font-weight: bold">Unit Price  </td>
									<td style="font-weight: bold">Quantity </td>
									<td> </td>
									<td> </td>
								</tr>
								<?php foreach ($listdetails as $detail) { 
									if ($detail->idorder == $order->numOrder) { 	?>
									<tr class="<?= $order->numOrder ?>-details" style="display:none" display="hidden">
										<td><?= $order->numOrder ?></td>
										<td></td>
										<td><?= $detail->product ?></td>
										<td><?= $detail->price ?></td>
										<td><?= $detail->order_quantity ?></td>
										<td></td>
										<td></td>
									</tr>
								<?php } 
									} ?>
									<tr class="<?= $order->numOrder ?>-details tableheader" style="display:none" display="hidden">
									<td style="display:none"><?= $order->numOrder ?></td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									</tr>
									<?php }
								?>
							</tbody>
						</table>
						<div class="col-12">
						<br>
						<br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php

$db =  new mysqli("localhost", "brubru", "hahamdp!123", "test");

$customer_query = "SELECT * FROM customer";
$resultcustomer = mysqli_query($db, $customer_query);

$listitemscustomer;
$cp = 0;
while($listitemscustomer = $resultcustomer->fetch_object()){
	$cp++;
    $itemcustomer[$cp] = $listitemscustomer;
}


$stock_query = "SELECT * FROM stocks";
$resultstock = mysqli_query($db, $stock_query);
$listitemsstock;

$cp = 0;
while($itemstock = $resultstock->fetch_object()){
	$cp++;
	$listitemsstock[$cp] = $itemstock;
}

?>

<div id="myModal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
		<div class="modal-content">
	  		<div class="modal-header">
				<h5 class="modal-title">Add Order</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  			<span aria-hidden="true">&times;</span>
				</button>
	  		</div>
			<form>
			<div class="modal-body">
                <div class="form-group">
					<label for="role-input">Select customer</label>
					<select class="form-control" id="customer-input" required>
                        <?php foreach ($itemcustomer as $customer) { ?>
                            
						    <option value="<?=$customer->id?>"><?=$customer->Name?> <?=$customer->LastName?></option>
                        <?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="order-input">Order Number</label>
					<input type="text" class="form-control" id="order-input" required>
				</div>
				<div class="form-group">
					<table id="order-table" class="display" style="width:100%">
						<thead>
							<tr>
								<th>Product</th>
								<th>UnitPrice</th>
								<th>Quantity</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($listitemsstock as $stock) { ?>
							<tr>
								<td style="width: 25%;"> <?= $stock->product ?> </td>
								<td> <input type="number" id="<?= str_replace(' ', '', $stock->product) ?>-price" class="form-control" value="<?= $stock->price ?>" disabled /></td>
								<td> <input type="number" class="form-control quantity" min="0" value="0" product="<?= str_replace(' ', '', $stock->product) ?>" pid="<?= $stock->id ?>" required> </td>
								<td> <input type="number" id="<?= str_replace(' ', '', $stock->product) ?>-total" class="form-control total" value="0" disabled /> </td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="form-group">
					<label for="price-input">Total Order</label>
					<input type="number" class="form-control" id="price-input" value="0" disabled>
				</div>
	  		</div>
	  		<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="add-order">Add</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	  		</div>
			</form>
		</div>
  	</div>
</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
	<script type="text/javascript" src="../js/datatable.js"></script>
	<script type="text/javascript" src="../js/orders.js"></script>
</body>
</html>