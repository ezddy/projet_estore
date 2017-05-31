<?php 
include_once('model/user.php');
session_start();
if(!isset($_SESSION['user'])) {
	header('refresh: 2; URL=http://localhost:8888/index.php');
	echo 'You need to be connected to place an order!';
	exit;
}

if(!isset($_SESSION['cart_items'])) {
	header('refresh: 2; URL=http://localhost:8888/index.php');
	echo 'Nothing in your cart';
	exit;
}
include_once('header.html');
include_once('database.php');

?>
<script type="text/javascript">
	function order() {
		var user = <?php echo $_SESSION['user']->getId(); ?>;
		var address = '<?php echo $_SESSION['user']->getShippingAddress(); ?>';
		$.ajax({
			type:'post',
			url: 'controller/add_order.php',
			data: {
				total_price: $('#total').text(),
				user_id: user,
				shipping_address: address
			},
			success: function(response) {
				window.location.href = '/index.php';
			},
			async: false
		});
	}
</script>
<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
		<?php include('topbar.php'); ?>

		<section id="page-title">

			<div class="container clearfix">
				<h1>Checkout</h1>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">Shop</a></li>
					<li class="active">Checkout</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="row clearfix">
						<div class="col-md-6">
							<div class="table-responsive clearfix">
								<h4>Your Orders</h4>

								<table class="table cart">
									<thead>
										<tr>
											<th class="cart-product-thumbnail">&nbsp;</th>
											<th class="cart-product-name">Product</th>
											<th class="cart-product-quantity">Quantity</th>
											<th class="cart-product-subtotal">Total</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$items = explode(',',$_SESSION['cart_items']);
										$db = get_db_connection();
										$stmt = $db->prepare("SELECT * FROM Product WHERE id = :id");
										$total = 0;
										foreach($items as $row) {
											$stmt->bindParam(":id", $row);
											$stmt->execute() or die ('impossible checkout');
											
											$result = $stmt->fetch();
											$total = $total + $result['price'];
											echo '<tr class="cart_item">';
												echo '<td class="cart-product-thumbnail">';
													echo '<a href="#"><img width="64" height="64" src="'.$result['image'].'" alt="'.$result['name'].'"></a>';
												echo '</td>';

												echo '<td class="cart-product-name">';
												echo '<a href="#">'.$result['name'].'</a>';
												echo '</td>';

												echo '<td class="cart-product-quantity">';
												echo '<div class="quantity clearfix">';
												echo '1';
												echo '</div>';
												echo '</td>';

												echo '<td class="cart-product-subtotal">';
												echo '<span class="amount">$'.$result['price'].'</span>';
												echo '</td>';
											echo '</tr>';
										}
										?>
									</tbody>

								</table>

							</div>
						</div>
						<div class="col-md-6">
							<div class="table-responsive">
								<h4>Cart Totals</h4>

								<table class="table cart">
									<tbody>
										<tr class="cart_item">
											<td class="notopborder cart-product-name">
												<strong>Cart Subtotal</strong>
											</td>

											<td class="notopborder cart-product-name">
												<span class="amount">$<?= $total; ?></span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Shipping</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount">Free Delivery</span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Total</strong>
											</td>

											<td class="cart-product-name">
												<strong><span id="total" class="amount color lead"><?= $total; ?></span></strong>
											</td>
										</tr>
									</tbody>
								</table>

							</div>
							<div class="accordion clearfix">
								<div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Direct Bank Transfer</div>
								<div class="acc_content clearfix">Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</div>

								<div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Cheque Payment</div>
								<div class="acc_content clearfix">Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.</div>

								<div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Paypal</div>
								<div class="acc_content clearfix">Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur.</div>
							</div>
							<a onclick="order()" class="button button-3d fright">Place Order</a>
						</div>
					</div>
				</div>

			</div>

		</section><!-- #content end -->

<?php include_once('footer.html'); ?>