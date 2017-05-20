<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Add category</title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
	<div class="container">
	<form action="category.php" method="POST">
		<div class="form-group">
			<label for="category">Category to add</label>
			<input type="text" id="category" name="category" required="required" class="form-control"><br>
		</div>
		<button type="submit">Add category</button>
	</form>
	</div>
</body>
</html>