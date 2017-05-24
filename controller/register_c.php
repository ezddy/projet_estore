<?php  
	require_once('../database.php');
	require_once('../model/user.php');
	session_start();
	if(!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['firstname']) || !isset($_POST['lastname']) || !isset($_POST['address']) || !isset($_POST['zipcode']) || !isset($_POST['city']) || !isset($_POST['phone'])) {
		echo 'Missing information';
		
	}else {
		if(user_exists($_POST['email'])) {
			echo 'Email already exists';
		}
		$email = $_POST['email'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$city = $_POST['city'];
		$zipcode = $_POST['zipcode'];
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$role = "pending_user";

		$member = new User($email, $password, $address, $phone, $city, $zipcode, $lastname, $firstname, $role);
		$_SESSION['user'] = $member;
		header('../index.php');
		exit;
	}
?>