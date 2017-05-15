<?php 
	require_once("database.php");

	if(isset($_POST["brand"])){
		$brand = $_POST["brand"];

		insert_brand($brand);
		header('Location: form_brand.php');
	}
	else{
		echo "Input error";
	}

 ?>