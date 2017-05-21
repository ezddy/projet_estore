<?php  
	require_once('database.php');
	if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['address']) && !empty($_POST['phone']) && !empty($_POST['city']) && !empty($_POST['zipcode']) && !empty($_POST['lastname']) && !empty($_POST['firstname'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$city = $_POST['city'];
		$zipcode = $_POST['zipcode'];
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		insert_user($email, $password, $address, $phone, $city, $zipcode, $lastname, $firstname);
		header('Location: form_registration.php');
	}else {
		header('Location: form_registration.php');
		echo 'Missing information';
	}

?>