<?php 
include_once("database.php");
echo "test";
if(isset($_POST['first-name']) && isset($_POST['last-name']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['zip']) && isset($_POST['mail'])){
	$fn = $_POST['first-name'];
	$ln = $_POST['last-name'];
	$ad = $_POST['address'];
	$ci = $_POST['city'];
	$zi = $_POST['zip'];
	$ma = $_POST['mail'];

	$cmd = 'UPDATE user SET firstname="'.$fn.'", lastname="'.$ln.'", address="'.$ad.'", city="'.$ci.'", zipcode="'.$zi.'" WHERE email="'.$ma.'"';

	exec_cmd($cmd);
	header("Location: profile.php");
}

 ?>