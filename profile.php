<?php 
	session_start();
	

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

</head>

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

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>
							<li><a href="index-shop.html"><div>Home</div></a></li>
							<li><a href="#"><div>Keyboards</div></a>
								<ul>
									<li><a href="#"><div><i class="icon-stack"></i>Logitech</div></a></li>
									<li><a href="#"><div><i class="icon-stack"></i>Steelseries</div></a></li>
									<li><a href="#"><div><i class="icon-stack"></i>Corsair</div></a></li>
									<li><a href="#"><div><i class="icon-stack"></i>Razer</div></a></li>
								</ul>
							</li>
							<li><a href="#"><div>Mouses</div></a>
								<ul>
									<li><a href="#"><div><i class="icon-stack"></i>Logitech</div></a></li>
									<li><a href="#"><div><i class="icon-stack"></i>Steelseries</div></a></li>
									<li><a href="#"><div><i class="icon-stack"></i>Zowie</div></a></li>
									<li><a href="#"><div><i class="icon-stack"></i>Razer</div></a></li>
								</ul>
							</li>
							
							<li><a href="#"><div>Headsets</div></a>
								<ul>
									<li><a href="#"><div><i class="icon-stack"></i>Logitech</div></a></li>
									<li><a href="#"><div><i class="icon-stack"></i>Sennheiser</div></a></li>
									<li><a href="#"><div><i class="icon-stack"></i>HyperX</div></a></li>
									<li><a href="#"><div><i class="icon-stack"></i>Razer</div></a></li>
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
							</div>
						</div><!-- #top-cart end -->

						<!-- Top Search
						============================================= -->
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div><!-- #top-search end -->

					</nav><!-- #primary-menu end -->

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
								<h3>Ha David</h3>
								<span>Your Profile Bio</span>
							</div>

							<div class="clear"></div>

							<div class="row clearfix">

								<div class="col-md-12">

									<div class="tabs tabs-alt clearfix" id="tabs-profile">

										<ul class="tab-nav clearfix">
											<li><a href="#tab-feeds"><i class="icon-rss2"></i> Feeds</a></li>
											<li><a href="#tab-orders"><i class="icon-pencil2"></i> Orders</a></li>
											<li><a href="#tab-reviews"><i class="icon-thumbs-up2"></i> Your reviews</a></li>
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
														<tr>
														  <td>
															<code>5/23/2016</code>
														  </td>
														  <td>Payment for Steelseries 6gv2 completed</td>
														</tr>
														<tr>
														  <td>
															<code>5/23/2016</code>
														  </td>
														  <td>Logged in to the Account at 16:33:01</td>
														</tr>
														<tr>
														  <td>
															<code>5/22/2016</code>
														  </td>
														  <td>Logged in to the Account at 09:41:58</td>
														</tr>
														<tr>
														  <td>
															<code>5/21/2016</code>
														  </td>
														  <td>Logged in to the Account at 17:16:32</td>
														</tr>
														<tr>
														  <td>
															<code>5/18/2016</code>
														  </td>
														  <td>Logged in to the Account at 22:53:41</td>
														</tr>
													  </tbody>
													</table>
												</div>

											</div>
											<div class="tab-content clearfix" id="tab-orders">

												<div class="row topmargin-sm clearfix">

												</div>

											</div>

											<div class="tab-content clearfix" id="tab-reviews">

												<div class="row topmargin-sm clearfix">

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

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; 2017 All Rights Reserved by E-store.<br>
						<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a href="#" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-vimeo">
								<i class="icon-vimeo"></i>
								<i class="icon-vimeo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-github">
								<i class="icon-github"></i>
								<i class="icon-github"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-yahoo">
								<i class="icon-yahoo"></i>
								<i class="icon-yahoo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-linkedin">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
						</div>

						<div class="clear"></div>

						<i class="icon-envelope2"></i> info@e-store.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +12-34-5678-9101 <span class="middot">&middot;</span> <i class="icon-skype2"></i> EstoreOnSkype
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="js/functions.js"></script>

	<script>
		jQuery( "#tabs-profile" ).on( "tabsactivate", function( event, ui ) {
			jQuery( '.flexslider .slide' ).resize();
		});
	</script>

</body>
</html>