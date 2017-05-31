<?php
session_start();
include_once('database.php');
include('header.html');
if(isset($_SESSION['user'])) {
	header('Location: index.php');
}
?>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

	<?php include_once('topbar.php'); ?>

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
									<label for="login">Username:</label>
									<input type="email" id="login" name="login" class="form-control" />
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