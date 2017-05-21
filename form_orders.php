<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Order</title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
<div class="container">
	<h1>Order form</h1>
	<form action="orders.php" method="POST">
	<div class="form-group">
		<label for="shipping">Shipping address</label>
		<input type="text" id="shipping" name="shipping" class="form-control">
	</div>
	<div class="form-group">	
		<label for="price">Total price</label>
		<input type="text" id="price" name="price" class="form-control">
	</div>
	<div class="form-group">
		<label for="user">User</label>
		<input type="number" id="user" name="user" class="form-control">
	</div>
	<button class="btn btn-primary" type="submit">Buy!</button>
	</form>
</div>
</body>
</html>