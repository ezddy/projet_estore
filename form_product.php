<?php require_once("database.php") ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Add product</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="product.php" method="POST">
		<label for="name">Name: </label>
		<input type="text" id="name" name="name" required="required"><br>

		<label for="description">Description: </label><br>
		<textarea id="description" name="description" required="required"></textarea>
		<!--<input type="text" id="description" name="description" required="required">--><br>

		<label for="price">Price: </label>
		<input type="number" id="price" name="price" required="required"><br>

		<label for="image">Image: </label>
		<input type="text" id="image" name="image" required="required"><br>

		<label for="category">Category: </label>
		<select name="category" id="category" required="required">';
			<option selected="selected"> </option>';
			<?php get_list_category(); ?>
		</select><br>

		<label for="brand">Brand: </label>
		<select name="brand" id="brand" required="required">';
			<option selected="selected"> </option>';
			<?php get_list_brand(); ?>
		</select><br>

		<button type="submit">Add product</button>
	</form>
</body>
</html>