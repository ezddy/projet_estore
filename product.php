<?php 
	require_once("database.php");

	if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["image"]) && isset($_POST["category"]) && isset($_POST["brand"])){

		$name = $_POST["name"];
		$description = $_POST["description"];
		$price = $_POST["price"];
		$image = $_POST["image"];
		$category = $_POST["category"];
		$brand = $_POST["brand"];

		insert_product($name, $description, $price, $image, $category, $brand);
		header('Location: form_product.php');
	}
	else{
		echo "Input error";
	}

 ?>