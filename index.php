<?php 
include_once('model/user.php');
session_start();
include_once('header.html');
include_once('database.php');
?>
<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Top Bar
		============================================= -->
		<div id="top-bar">

			<div class="container clearfix">

				<div class="col_half nobottommargin hidden-xs">

					<p class="nobottommargin"><strong>Call:</strong> 1800-547-2145 | <strong>Email:</strong> info@estore.com</p>

				</div>

				<div class="col_half col_last fright nobottommargin">

					<!-- Top Links
					============================================= -->
					<div class="top-links">

						<ul>
							<?php if(!isset($_SESSION['user'])) { ?>
							<li><a href="login.php">Login</a>
								<div class="top-link-section">
									<form id="top-login" role="form" action="controller/login_c.php" method="post">
										<div class="input-group" id="top-login-username">
											<span class="input-group-addon"><i class="icon-user"></i></span>
											<input type="email" name="login" id="login" class="form-control" placeholder="Email address" required="">
										</div>
										<div class="input-group" id="top-login-password">
											<span class="input-group-addon"><i class="icon-key"></i></span>
											<input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
										</div>
										<label class="checkbox">
										  <input type="checkbox" value="remember-me"> Remember me
										</label>
										<button class="btn btn-danger btn-block" type="submit">Sign in</button>
									</form>
								</div>
							</li>
						</ul><?php } else {
							?>
							<li><a href="profile.php"><?php echo $_SESSION['user']->getLastname(). ' ' .$_SESSION['user']->getFirstname(); ?></a>
								<div class="top-link-section">
									<a href="controller/logout_c.php">Logout</a>
								</div>
							</li>
							<?php } ?>
					</div><!-- .top-links end -->

				</div>

			</div>

		</div><!-- #top-bar end -->

		<!-- Header
		============================================= -->
		<header id="header" class="sticky-style-2">

			<div class="container clearfix">

				<!-- Logo
				============================================= -->
				<div id="logo">
					<a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="E-store Logo"></a>
					<a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo@2x.png" alt="E-store Logo"></a>
				</div><!-- #logo end -->

				<ul class="header-extras">
					<li>
						<i class="i-medium i-circled i-bordered icon-thumbs-up2 nomargin"></i>
						<div class="he-text">
							Original Brands
							<span>100% Guaranteed</span>
						</div>
					</li>
					<li>
						<i class="i-medium i-circled i-bordered icon-truck2 nomargin"></i>
						<div class="he-text">
							Free Shipping
							<span>for $20 or more</span>
						</div>
					</li>
					<li>
						<i class="i-medium i-circled i-bordered icon-undo nomargin"></i>
						<div class="he-text">
							30-Day Returns
							<span>Completely Free</span>
						</div>
					</li>
				</ul>

			</div>

			<div id="header-wrap">

				<!-- Primary Navigation
				============================================= -->
				<nav id="primary-menu" class="style-2">

					<div class="container clearfix">

						<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

							<ul>
								<li class="current"><a href="#"><div>Home</div></a></li>
								<!-- Mega Menu
								============================================= -->
								<?php fill_nav(); ?>
								<!-- .mega-menu end -->
							</ul>
						<!-- Top Cart
						============================================= -->
						<div id="top-cart">
							<a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>5</span></a>
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

					</div>

				</nav><!-- #primary-menu end -->

			</div>

		</header><!-- #header end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">
				<div class="container clearfix">

					<div class="col_full bottommargin-lg col_last">
						<div class="feature-box center media-box fbox-bg">
							<div class="fbox-media">
								<img src="images/items/steelseries_6gv2.jpg" alt="steelseries">
							</div>
							<div class="fbox-desc">
								<h3>Latest Product Arrivals<h3>
								<p><a href="#" class="btn btn-default">Check New Arrivals</a></p>
							</div>
						</div>
					</div>

					<div class="clear"></div>

					<div class="col_one_third nobottommargin">

						<div class="fancy-title title-border">
							<h4>Recently Arrived</h4>
						</div>
						<div>Something</div>

					</div>

					<div class="col_one_third nobottommargin">

						<div class="fancy-title title-border">
							<h4>Popular Products</h4>
						</div>

						<div>Something</div>

					</div>

					<div class="col_one_third nobottommargin col_last">

						<div class="fancy-title title-border">
							<h4>Recommended for You</h4>
						</div>

						<div>Something</div>

					</div>

					<div class="clear"></div><div class="line"></div>

					<div id="oc-clients-full" class="owl-carousel image-carousel carousel-widget" data-margin="30" data-nav="false" data-autoplay="5000" data-pagi="false" data-items-xxs="2" data-items-xs="3" data-items-sm="4" data-items-md="5" data-items-lg="7">

						<div class="oc-item"><a href="#"><img src="images/clients/logo/steelseries.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="#"><img src="images/clients/logo/corsair.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="#"><img src="images/clients/logo/zowie.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="#"><img src="images/clients/logo/logitech.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="#"><img src="images/clients/logo/razer.png" alt="Clients"></a></div>
					</div>


				</div>

				<div class="si-sticky si-sticky-right hidden-sm hidden-xs">
					<a href="#" class="social-icon si-colored si-facebook" data-animate="bounceInRight">
						<i class="icon-facebook"></i>
						<i class="icon-facebook"></i>
					</a>
					<a href="#" class="social-icon si-colored si-twitter" data-animate="bounceInRight" data-delay="100">
						<i class="icon-twitter"></i>
						<i class="icon-twitter"></i>
					</a>
					<a href="#" class="social-icon si-colored si-pinterest" data-animate="bounceInRight" data-delay="200">
						<i class="icon-pinterest"></i>
						<i class="icon-pinterest"></i>
					</a>
					<a href="#" class="social-icon si-colored si-instagram" data-animate="bounceInRight" data-delay="300">
						<i class="icon-instagram"></i>
						<i class="icon-instagram"></i>
					</a>
					<a href="#" class="social-icon si-colored si-gplus" data-animate="bounceInRight" data-delay="600">
						<i class="icon-gplus"></i>
						<i class="icon-gplus"></i>
					</a>
					<a href="#" class="social-icon si-colored si-rss" data-animate="bounceInRight" data-delay="700">
						<i class="icon-rss"></i>
						<i class="icon-rss"></i>
					</a>
				</div>

			</div>

		</section><!-- #content end -->

<?php include_once('footer.html'); ?>