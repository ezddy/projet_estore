<?php 
	require_once('../model/user.php');
	require_once('../database.php');
	session_start();
	if(!empty($_POST['id_item'])) {
		$id_item = $_POST['id_item'];
		if(isset($_SESSION['cart_items'])) {
		$_SESSION['cart_items'] .= ',' . $id_item;
		}else{
			$_SESSION['cart_items'] = $id_item;
		}
		$db = get_db_connection();
		$stmt = $db->prepare("SELECT * FROM Product WHERE id='$id_item'");
		$stmt->execute() or die ('retrieving product impossible');
		$result = $stmt->fetch();
		echo "<div class='top-cart-item clearfix'>
				<div class='top-cart-item-image'>
					<a href='#'><img src='".$result['image']."' alt='".$result['name']."' /></a>
				</div>
				<div class='top-cart-item-desc'>
					<a href='#'>".$result['name']."</a>
					<span class='top-cart-item-price'>$".$result['price']."</span>
					<span class='top-cart-item-quantity'>x 1</span>
				</div>
			</div>";
		exit();
	}
	if(!empty($_POST['total_items'])) {
		if(isset($_SESSION['cart_items'])) {
			$items = explode(',', $_SESSION['cart_items']);
			echo count($items);
		}else {
			echo '0';
		}
		exit();
	}
	if(!empty($_POST['total_price'])) {
		if(isset($_SESSION['cart_items'])) {
			$items = explode(',', $_SESSION['cart_items']);
			$db = get_db_connection();
			$stmt = $db->prepare("SELECT * FROM Product WHERE id = :id");
			$total = 0;
			foreach($items as $row) {

				$stmt->bindParam(':id', $row);
				$stmt->execute() or die(print_r($stmt->errorInfo(), true));
				$result = $stmt->fetch();
				$total = $total + $result['price'];
			 }
			 echo $total . '$';
			
		}else {
			echo '0';
		}
		exit();
	}
?>