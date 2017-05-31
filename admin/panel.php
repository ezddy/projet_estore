<?php 
	require_once('../model/user.php');
	require_once('../model/category.php');
	require_once('../model/brand.php');
	require_once('../model/orders.php');
	require_once('../model/product.php');
	require_once('../model/contains.php');
	session_start();
	if(isset($_SESSION['user'])) {
		if($_SESSION['user']->getRole() !== 'admin') {
			header('Location: ../index.php');
		}
	}else {
		header('Location: ../index.php');
	}
	require_once('../header.html');

	if(isset($_POST['name-brand'])) {
		$brand = new Brand($_POST['name-brand']);
	}else if(isset($_POST['name-category'])) {
		$category = new Category($_POST['name-category']);
	}else if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['image']) && isset($_POST['category']) && isset($_POST['brand'])) {
		$product = new Product($_POST['name'], $_POST['description'], $_POST['price'], $_POST['image'], $_POST['category'], $_POST['brand']);
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
						<a href="index.html" class="standard-logo" data-dark-logo="/images/logo-dark.png"><img src="/images/logo.png" alt="eStore Logo"></a>
						<a href="index.html" class="retina-logo" data-dark-logo="/images/logo-dark@2x.png"><img src="/images/logo@2x.png" alt="eStore Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<?php require_once('../navbar.php'); ?>
				</div>

			</div>

		</header><!-- #header end -->

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Admin panel</h1>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Admin panel</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div id="side-navigation" class="tabs custom-js">

						<div class="col_one_third nobottommargin">

							<ul class="sidenav">
								<li class="ui-tabs-active"><a href="#insert_brand"><i class="icon-magic"></i>Create a brand<i class="icon-chevron-right"></i></a></li>
								<li><a href="#insert_category"><i class="icon-tint"></i>Create a category<i class="icon-chevron-right"></i></a></li>
								<li><a href="#insert_product"><i class="icon-gift"></i>Create a product<i class="icon-chevron-right"></i></a></li>
								<li><a href="#view_orders"><i class="icon-adjust"></i>View orders<i class="icon-chevron-right"></i></a></li>
							</ul>

						</div>

						<div class="col_two_third col_last nobottommargin">

							<div id="insert_brand">
								<h3>Create a brand</h3>
								<form id="brand-form" name="brand-form" class="nobottommargin" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
									<div class="col_full">
										<label for="name">Name:</label>
										<input type="text" id="name-brand" name="name-brand" class="form-control"/>
									</div>
									<div class="col_full nobottommargin">
										<button class="button button-3d button-black nomargin" id="brand-form-submit" name="brand-form-submit" value="login">Create a brand</button>
									</div>
								</form>
							</div>

							<div id="insert_category">
								<h3>Create a category</h3>
								<form id="category-form" name="category-form" class="nobottommargin" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
									<div class="col_full">
										<label for="name">Name:</label>
										<input type="text" id="name-category" name="name-category" class="form-control"/>
									</div>
									<div class="col_full nobottommargin">
										<button class="button button-3d button-black nomargin" id="category-form-submit" name="category-form-submit" value="login">Create category</button>
									</div>
								</form>
							</div>

							<div id="insert_product">
								<h3>Create a product</h3>
								<form id="product-form" name="product-form" class="nobottommargin" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
									<div class="col_full">
										<label for="name">Name:</label>
										<input type="text" id="name" name="name" class="form-control"/>
									</div>
									<div class="col_full">
										<label for="description">Description:</label>
										<input type="text" id="description" name="description" class="form-control"/>
									</div>
									<div class="col_full">
										<label for="price">Price:</label>
										<input type="number" id="price" name="price" class="form-control"/>
									</div>
									<div class="col_full">
										<label for="image">Image link:</label>
										<input type="text" id="image" name="image" class="form-control"/>
									</div>
									<div class="col_full">
										<label for="category">Category:</label>
										<select class="form-control" name="category">
											<?php $category = retrieve_category();

											foreach ($category as $row) {
												echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
											}
											 ?>
										</select>
									</div>
									<div class="col_full">
										<label for="brand">Brand:</label>
										<select class="form-control" name="brand">
											<?php $brand = retrieve_brands();

											foreach ($brand as $row) {
												echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
											}
											 ?>
										</select>
									</div>

									<div class="col_full nobottommargin">
										<button class="button button-3d button-black nomargin" id="product-form-submit" name="product-form-submit" value="login">Create a product</button>
									</div>
								</form>
							</div>

							<div id="view_orders">
								<h3>Pending orders</h3>
							</div>
						</div>

					</div>

				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
<?php include_once('../footer.html'); ?>
	