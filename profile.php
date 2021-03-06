<?php 
	include_once("model/user.php");
	session_start();
	if(!isset($_SESSION['user'])) {
		header('Location: login.php');
	}else if($_SESSION['user']->getRole() === "admin") {
		header('Location: admin/panel.php');
	}
	include_once('header.html');
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
						<a href="index.php" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="E-store Logo"></a>
						<a href="index.php" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo@2x.png" alt="E-store Logo"></a>
					</div><!-- #logo end -->

					<div id="top-account" class="dropdown">
						<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon-user"></i><i class="icon-angle-down"></i></a>
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
							<li><a href="#">Profile</a></li>
							<li><a href="#">Messages <span class="badge">5</span></a></li>
							<li><a href="#">Settings</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Logout <i class="icon-signout"></i></a></li>
						</ul>
					</div>

				</div>

			</div>

		</header><!-- #header end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="row clearfix">

						<div class="col-sm-9">

							<img src="images/icons/avatar.jpg" class="alignleft img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 84px;">

							<div class="heading-block noborder">
								<h3><?php echo $_SESSION['user']->getLastname()." ".$_SESSION['user']->getFirstname()/*->getLastname()." ".$_SESSION['user']->getFirstname()*/; ?></h3>
								<span>Your Profile</span>
							</div>

							<div class="clear"></div>

							<div class="row clearfix">

								<div class="col-md-12">

									<div class="tabs tabs-alt clearfix" id="tabs-profile">

										<ul class="tab-nav clearfix">
											<li><a href="#tab-feeds"><i class="icon-rss2"></i> Feeds</a></li>
											<li><a href="#tab-orders"><i class="icon-pencil2"></i> Orders</a></li>
											<li><a href="#tab-settings"><i class="icon-cog"></i> Settings</a></li>
										</ul>

										<div class="tab-container">

											<div class="tab-content clearfix" id="tab-feeds">

												<p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium harum ea quo! Nulla fugiat earum, sed corporis amet iste non, id facilis dolorum, suscipit, deleniti ea. Nobis, temporibus magnam doloribus. Reprehenderit necessitatibus esse dolor tempora ea unde, itaque odit. Quos.</p>

												<div class="table-responsive">
													<table class="table table-bordered table-striped">
													  <colgroup>
														<col class="col-xs-1">
														<col class="col-xs-7">
													  </colgroup>
													  <thead>
														<tr>
														  <th>Time</th>
														  <th>Activity</th>
														</tr>
													  </thead>
													  <tbody>
														<?php $_SESSION['user']->get_last_5_orders() ?>
													  </tbody>
													</table>
												</div>

											</div>
											<div class="tab-content clearfix" id="tab-orders">

												<div class="row topmargin-sm clearfix">
													<table class="table table-bordered table-striped">
													  <colgroup>
														<col class="col-xs-1">
														<col class="col-xs-7">
													  </colgroup>
													  <thead>
														<tr>
														  <th>Date order</th>
														  <th>Date delivery</th>
														  <th>Status</th>
														  <th>Shipping address</th>
														</tr>
													  </thead>
													  <tbody>
														<?php $_SESSION['user']->get_orders(); ?>
													  </tbody>
													</table>

												</div>

											</div>

											<div class="tab-content clearfix" id="tab-settings">

												<div class="row topmargin-sm clearfix">
													<div id="insert_category">
														<h3>Personal information</h3>
														<form id="category-form" name="category-form" class="nobottommargin" action="update_user_info.php" method="post">
														<?php $_SESSION['user']->get_user_info(); ?>
														</form>
													</div>

												</div>

											</div>
										</div>

									</div>

								</div>

							</div>

						</div>

						<div class="line visible-xs-block"></div>

						<div class="col-sm-3 clearfix">

							<div class="list-group">
								<a href="#" class="list-group-item clearfix">Profile <i class="icon-user pull-right"></i></a>
								<a href="#" class="list-group-item clearfix">Orders <i class="icon-envelope-alt pull-right"></i></a>
								<a href="#" class="list-group-item clearfix">Billing <i class="icon-credit-cards pull-right"></i></a>
								<a href="#" class="list-group-item clearfix">Settings <i class="icon-cog pull-right"></i></a>
								<a href="#" class="list-group-item clearfix">Logout <i class="icon-line2-logout pull-right"></i></a>
							</div>

							<div class="fancy-title topmargin title-border">
								<h4>About Me</h4>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum laboriosam, dignissimos veniam obcaecati. Quasi eaque, odio assumenda porro explicabo laborum!</p>

							<div class="fancy-title topmargin title-border">
								<h4>Social Profiles</h4>
							</div>

							<a href="#" class="social-icon si-facebook si-small si-rounded si-light" title="Facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-gplus si-small si-rounded si-light" title="Google+">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon si-dribbble si-small si-rounded si-light" title="Dribbble">
								<i class="icon-dribbble"></i>
								<i class="icon-dribbble"></i>
							</a>

							<a href="#" class="social-icon si-flickr si-small si-rounded si-light" title="Flickr">
								<i class="icon-flickr"></i>
								<i class="icon-flickr"></i>
							</a>

							<a href="#" class="social-icon si-linkedin si-small si-rounded si-light" title="LinkedIn">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>

							<a href="#" class="social-icon si-twitter si-small si-rounded si-light" title="Twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

						</div>

					</div>

				</div>

			</div>

		</section><!-- #content end -->

<?php include_once('footer.html'); ?>