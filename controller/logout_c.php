<?php 
	include_once('../model/user.php');
	session_start();
	header('Location: /index.php');
	if(isset($_SESSION['user'])) {
		$_SESSION['user']->logout();
	}

 ?>