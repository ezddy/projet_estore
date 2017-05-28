<?php 
	include_once('../model/user.php');
	session_start();
	header('Location: projet_estore/index.php');
	if(isset($_SESSION['user'])) {
		$_SESSION['user']->logout();
	}

 ?>