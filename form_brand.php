<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Add brand</title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
	<div class="container">
	<form action="brand.php" method="POST">
		<div class="form-group">
			<label for="brand">Brand to add</label>
			<input type="text" id="brand" name="brand" required="required" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Add brand</button>
	</form>
	</div>
</body>
</html>