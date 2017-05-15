<?php 
	require_once("database.php");

	if(isset($_POST["category"])){
		$category = $_POST["category"];

		insert_category($category);
		header('Location: form_category.php');
	}
	else{
		echo "Input error";
	}

 ?>