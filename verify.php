<?php
	require_once('database.php');
	if(!isset($_GET['user']) || !isset($_GET['token'])) {
		header('Location: index.php');
	}else {
		header('Loction: login.php');
		$email = $_GET['user'];
		$token = $_GET['token'];

		$result = query_cmd("SELECT * FROM User WHERE email = '$email'")->fetch();
		if($result['role'] === "user") {
			echo 'Already confirmed';
		}
		else if($result['hash'] === $token) {
			exec_cmd("UPDATE User SET role='user' WHERE email='$email'");
		}

	}
?>