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
		<?php include('topbar.php'); ?>

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