<?php require_once("database.php") ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Add product</title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
	<div class="container">
	<form action="product.php" method="POST">
		<div class="form-group">
			<label for="name">Name: </label>
			<input type="text" id="name" name="name" required="required" class="form-control">

			<label for="description">Description: </label>
			<textarea id="description" name="description" required="required" class="form-control"></textarea>

			<label for="price">Price: </label>
			<input type="number" id="price" name="price" required="required" class="form-control">

			<label for="image">Image: </label>
			<input type="text" id="image" name="image" required="required" class="form-control">

			<label for="category">Category: </label>
			<select name="category" id="category" required="required" class="form-control">';
				<option selected="selected"> </option>';
				<?php get_list_category(); ?>
			</select>

			<label for="brand">Brand: </label>
			<select name="brand" id="brand" required="required" class="form-control">';
			<option selected="selected"> </option>';
			<?php get_list_brand(); ?>
		</select>
		</div>
		

		<button type="submit" class="btn btn-primary">Add product</button>
	</form>
	</div>
</body>
</html>