<?php  
	require_once('database.php');
	if(!empty($_POST['shipping']) && !empty($_POST['price']) && !empty($_POST['user'])) {
		$shipping = $_POST['shipping'];
		$price = $_POST['price'];
		$user = $_POST['user'];
		insert_order($shipping, 'Pending', date('Y-m-d'), $price, $user);
	}else {
		header('Location: form_orders.php');
		exit;
	}
?>