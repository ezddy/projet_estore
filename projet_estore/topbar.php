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
						<?php } else {
							?>
							<li><a href="profile.php"><?php echo $_SESSION['user']->getLastname(). ' ' .$_SESSION['user']->getFirstname(); ?></a>
								<div class="top-link-section">
									<a href="controller/logout_c.php">Logout</a>
								</div>
							</li>
							<?php } ?>
							</ul>
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
					<a href="index.php" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="E-store Logo"></a>
					<a href="index.php" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo@2x.png" alt="E-store Logo"></a>
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
								<li><a href="index.php"><div>Home</div></a></li>
								<!-- Mega Menu
								============================================= -->
								<?php fill_nav(); ?>
								<!-- .mega-menu end -->
							</ul>
						<!-- Top Cart
						============================================= -->
						<div id="top-cart">
							<a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span id="count_cart"><?php if(isset($_SESSION['cart_items'])) {
									$items = explode(',', $_SESSION['cart_items']);
									echo count($items);
								} else echo '0';?></span></a>
							<div class="top-cart-content">
								<div class="top-cart-title">
									<h4>Shopping Cart</h4>
								</div>
								<div id="shopping_cart" class='top-cart-items'>
									<?php 

									$total = 0;
									if(isset($_SESSION['cart_items'])) {
										require_once('database.php');
										$items = explode(',', $_SESSION['cart_items']);
										$db = get_db_connection();
										$stmt = $db->prepare("SELECT * FROM Product WHERE id= :id");
										foreach($items as $row) {;
											$stmt->bindParam(':id', $row);
											$stmt->execute() or die ('retrieving product impossible');
											$result = $stmt->fetch();
											$total += $result['price'];
											echo "<div class='top-cart-item clearfix'>
													<div class='top-cart-item-image'>
														<a href='#'><img src='".$result['image']."' alt='".$result['name']."' /></a>
													</div>
													<div class='top-cart-item-desc'>
														<a href='#'>".$result['name']."</a>
														<span class='top-cart-item-price'>$".$result['price']."</span>
														<span class='top-cart-item-quantity'>x 1</span>
													</div>
												</div>";

										}
									}
									 ?>
								</div>
								<div class="top-cart-action clearfix">
									<span id="total_price" class="fleft top-checkout-price">$<?= $total; ?></span>
									<a href="checkout.php" class="button button-3d button-small nomargin fright">View Cart</a>
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