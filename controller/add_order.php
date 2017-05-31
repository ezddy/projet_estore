<?php 
include('../model/orders.php');
session_start();
if(isset($_POST['total_price']) && isset($_POST['user_id']) && isset($_POST['shipping_address'])) {
	header('Location: ../index.php');
	$price = $_POST['total_price'];
	$user = $_POST['user_id'];
	$address = $_POST['shipping_address'];
	$items = explode(',',$_SESSION['cart_items']);
	$order = new Orders($address, $user, $price, $items);
	unset($_SESSION['cart_items']);
}

?>