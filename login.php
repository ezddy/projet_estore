<?php
session_start();
include('header.html');
if(isset($_SESSION['user'])) {
	header('Location: index.php');
}
?>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="E-store Logo"></a>
						<a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo@2x.png" alt="E-store Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>
							<li><a href="index.html"><div>Home</div></a></li>
							<li><a href="#"><div>Keyboards</div></a>
								<ul>
									<li><a href="shop.html"><div><i class="icon-stack"></i>Logitech</div></a></li>
									<li><a href="shop.html"><div><i class="icon-stack"></i>Steelseries</div></a></li>
									<li><a href="shop.html"><div><i class="icon-stack"></i>Corsair</div></a></li>
									<li><a href="shop.html"><div><i class="icon-stack"></i>Razer</div></a></li>
								</ul>
							</li>
							<li><a href="#"><div>Mouses</div></a>
								<ul>
									<li><a href="shop.html"><div><i class="icon-stack"></i>Logitech</div></a></li>
									<li><a href="shop.html"><div><i class="icon-stack"></i>Steelseries</div></a></li>
									<li><a href="shop.html"><div><i class="icon-stack"></i>Zowie</div></a></li>
									<li><a href="shop.html"><div><i class="icon-stack"></i>Razer</div></a></li>
								</ul>
							</li>
							
							<li><a href="#"><div>Headsets</div></a>
								<ul>
									<li><a href="shop.html"><div><i class="icon-stack"></i>Logitech</div></a></li>
									<li><a href="shop.html"><div><i class="icon-stack"></i>Sennheiser</div></a></li>
									<li><a href="shop.html"><div><i class="icon-stack"></i>HyperX</div></a></li>
									<li><a href="shop.html"><div><i class="icon-stack"></i>Razer</div></a></li>
								</ul>
							</li>
							<li><a href="#"><div>About us</div></a></li>
						</ul>

						<!-- Top Cart
						============================================= -->
						<div id="top-cart">
							<a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>0</span></a>
							<div class="top-cart-content">
								<div class="top-cart-title">
									<h4>Shopping Cart</h4>
								</div>
								<div class="top-cart-action clearfix">
									<button class="button button-3d button-small nomargin fright">View Cart</button>
								</div>
							</div>
						</div><!-- #top-cart end -->

						<!-- Top Search
						============================================= -->
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" placeholder="Type &amp; Hit Enter..">
							</form>
						</div><!-- #top-search end -->
					</nav><!-- #primary-menu end -->
				</div>
			</div>
		</header><!-- #header end -->

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>My Account</h1>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">Pages</a></li>
					<li class="active">Login</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

						<div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Login to your Account</div>

						<div class="acc_content clearfix">
							<form id="login-form" name="login-form" class="nobottommargin" action="controller/login_c.php" method="post">
								<div class="col_full">
									<label for="login-form-username">Username:</label>
									<input type="text" id="login" name="login" class="form-control" />
								</div>

								<div class="col_full">
									<label for="login-form-password">Password:</label>
									<input type="password" id="password" name="password" class="form-control" />
								</div>

								<div class="col_full nobottommargin">
									<button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
									<a href="#" class="fright">Forgot Password?</a>
								</div>
							</form>
						</div>

						<div class="acctitle"><i class="acc-closed icon-user4"></i><i class="acc-open icon-ok-sign"></i>New Signup? Register for an Account</div>
						<div class="acc_content clearfix">
							<form id="register-form" name="register-form" class="nobottommargin" action="controller/register_c.php" method="post">
								<div class="col_full">
									<label for="email">Email Address:</label>
									<input type="text" id="email" name="email" class="form-control" />
								</div>

								<div class="col_full">
									<label for="password">Choose Password:</label>
									<input type="password" id="password" name="password" class="form-control" />
								</div>

								<div class="col_full">
									<label for="repassword">Re-enter Password:</label>
									<input type="password" id="repassword" name="repassword" class="form-control" />
								</div>
								
								<div class="col_full">
									<label for="firstname">Firstname:</label>
									<input type="text" id="firstname" name="firstname" class="form-control" />
								</div>

								<div class="col_full">
									<label for="lastname">Lastname:</label>
									<input type="text" id="lastname" name="lastname" class="form-control" />
								</div>

								<div class="col_full">
									<label for="address">Address:</label>
									<input type="text" id="address" name="address" class="form-control">
								</div>

								<div class="col_full">
									<label for="city">City:</label>
									<input type="text" class="form-control" id="city" name="city">
								</div>

								<div class="col_full">
									<label for="zipcode">Zipcode</label>
									<input type="text" class="form-control" id="zipcode" name="zipcode">
								</div>

								<div class="col_full">
									<label for="phone">Phone:</label>
									<input type="text" id="phone" name="phone" class="form-control" />
								</div>

								
								<div class="col_full nobottommargin">
									<button class="button button-3d button-black nomargin" id="submit" name="submit" value="register">Register Now</button>
								</div>
							</form>
						</div>
		
					</div>

				</div>

			</div>

		</section><!-- #content end -->

<?php include('footer.html'); ?>