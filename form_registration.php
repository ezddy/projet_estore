<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registration</title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
<div class="container">
	<h1>Registration form</h1>
	<form action="registration.php" method="POST">
	<div class="form-group">
		<label for="email">Your email address</label>
		<input type="email" id="email" name="email" class="form-control">
	</div>
	<div class="form-group">	
		<label for="password">Your password</label>
		<input type="password" id="password" name="password" class="form-control">
	</div>
	<div class="form-group">
		<label for="lastname">Lastname</label>
		<input type="text" id="lastname" name="lastname" class="form-control">
	</div>
	<div class="form-group">
		<label for="firstname">Firstname</label>
		<input type="text" id="firstname" name="firstname" class="form-control">
	</div>
	<div class="form-group">
		<label for="phone">Phone number</label>
		<input type="text" id="phone" name="phone" class="form-control">
		<label for="address">Address</label>
		<input type="text" id="address" name="address" class="form-control">
		<label for="city">City</label>
		<input type="text" id="city" name="city" class="form-control">
		<label for="zipcode">Zipcode</label>
		<input type="text" id="zipcode" name="zipcode" class="form-control">
	</div>
	<button class="btn btn-primary" type="submit">Register!</button>
	</form>
</div>
</body>
</html>