<?php 
/*include_once('model/user.php');
include_once("database.php"); 
session_start();*/
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Ha David, Le Niger Florent" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
	
	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>E-store</title>


	<!--<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$.ajax({
				type: 'post',
				url: 'controller/add_to_cart.php',
				data: {
					total_items: "total_cart_items"
				},
				success: function(response) {
					var div = document.getElementById("count_cart");
					div.innerHTML = response;
				}
			});
		});
		function cart(id) {
			$.ajax({
				type:'post',
				url: 'controller/add_to_cart.php',
				data: {
					id_item: id
				},
				success: function(response) {
					var div = document.getElementById("shopping_cart");
					div.innerHTML += response;
				}
			});
			$.ajax({
				type: 'post',
				url: 'controller/add_to_cart.php',
				data: {
					total_items: "total_cart_items"
				},
				success: function(response) {
					var div = document.getElementById("count_cart");
					div.innerHTML = response;
				}
			});

			$.ajax({
				type: 'post',
				url: 'controller/add_to_cart.php',
				data: {
					total_price: "total_price"
				},
				success: function(response) {
					var div = document.getElementById("total_price");
					div.innerHTML = response;
				}
			});
		}
	</script> -->

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Top Bar
		============================================= -->
		<?php //include('topbar.php'); ?>
		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Shop</h1>
				<span>Start Buying your Favourite Theme</span>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Shop</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Shop
					============================================= -->
					<div id="shop" class="shop product-1 clearfix">
						<?/*php 
							if(!isset($_GET['category'])){
								$_GET['category']="";
							}
							if(!isset($_GET['Brand'])){
								$_GET['brand']="";
							}
							fill_shop($_GET['category'], $_GET['brand']); */
						?>
					</div><!-- #shop end -->
				</div>
			</div>

		</section><!-- #content end -->

<?php //include('footer.html'); ?>