<?php 
	require_once('../model/user.php');
	require_once('../database.php');
	session_start();
	if(!isset($_POST['login']) && !isset($_POST['password'])) {
		header('../login.php');
	}else {
		header('Location: ../index.php');
		$email = $_POST['login'];
		$password = $_POST['password'];
		$result = query_cmd("SELECT * FROM User WHERE email = '$email'")->fetch();
		$encryptedPW = crypt($password, $result['password_salt']);

		if($encryptedPW === $result['password']) {
			$user = new User($email);
			$_SESSION['user'] = $user;
		}else {
			header('Location: ../login.php');
		}
	}

?>