<?php 
	$path = $_SERVER["DOCUMENT_ROOT"];
	$path .= 'projet_estore/controller/mail.php';
	require_once($path);
	function get_db_connection() {
		$db = new PDO('mysql:host=localhost:3305;dbname=web_prog','root','root');
		return $db;
	}

	function query_cmd($sqlCommand) {
		$db = get_db_connection();
		return $db->query($sqlCommand);
	}

	function exec_cmd($sqlCommand) {
		$db = get_db_connection();
		$stmt = $db->prepare($sqlCommand);
		$stmt->execute() or die(print_r($stmt->errorInfo(), true));
	}

	function insert_user($email, $password, $address, $phone, $city, $zipcode, $lastname, $firstname, $role) {
		$salt = mcrypt_create_iv(32, MCRYPT_DEV_URANDOM);
		$encryptedPW = crypt($password, $salt);
		$hash = md5(rand(0,1000));
		$db = get_db_connection();
		$stmt = $db->prepare('INSERT INTO User (email, password, address, phone, city, zipcode, lastname, firstname, password_salt, role, hash) VALUES(:email, :password, :address, :phone, :city, :zipcode, :lastname, :firstname, :password_salt, :role, :hash)');
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $encryptedPW);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':phone', $phone);
		$stmt->bindParam(':city', $city);
		$stmt->bindParam(':zipcode', $zipcode);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':password_salt', $salt);
		$stmt->bindParam(':role', $role);
		$stmt->bindParam(':hash', $hash);
		$stmt->execute();

		if($role === "pending_user") {
			$link = 'http://localhost:8888/verify.php?user='.$email.'&token='.$hash;
			send_email($email, 'E-mail verification from eStore', 'Verify your account by clicking on this link : ' . $link);
		}
	}

	function insert_product($name, $description, $price, $image, $category, $brand) {
		$db = get_db_connection();
		$stmt = $db->prepare("INSERT INTO Product (name, description, price, image, id_Category, id_Brand VALUES(:name, :description, :price, :image, :category, :brand)");
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':price', $price);
		$stmt->bindParam(':image', $image);
		$stmt->bindParam(':category', $category);
		$stmt->bindParam(':brand', $brand);
		$stmt->execute() or die ('insert product impossible');
	}

	function insert_brand($name) {
		$db = get_db_connection();
		$stmt = $db->prepare("INSERT INTO Brand (name) VALUES(:name)");
		$stmt->bindParam(':name', $name);
		$stmt->execute() or die ('insert brand impossible');
	}

	function insert_category($name) {
		$db = get_db_connection();
		$stmt = $db->prepare("INSERT INTO Category (name) VALUES(:name)");
		$stmt->bindParam(':name', $name);
		$stmt->execute() or die ('insert category impossible');
	}

	function insert_order($shipping_address, $status, $dateOrder, $totalPrice, $user) {
		$db = get_db_connection();
		$stmt = $db->prepare("INSERT INTO Orders(status, shipping_address, dateOrder, id_User, totalPrice) VALUES(:status, :shipping_address, :dateOrder, :id_User, :totalPrice)");
		$stmt->bindParam(':status', $status);
		$stmt->bindParam(':shipping_address', $shipping_address);
		$stmt->bindParam(':dateOrder', $dateOrder);
		$stmt->bindParam(':totalPrice', $totalPrice);
		$stmt->bindParam(':id_User', $user);
		$stmt->execute() or die ('insert order impossible');
	}

	function insert_contains($order, $product) {
		$db = get_db_connection();
		$stmt = $db->prepare("INSERT INTO contains VALUES(:order, :product)");
		$stmt->bindParam(':order', $order);
		$stmt->bindParam(':product', $product);
		$stmt->execute() or die ('insert contains impossible');
	}

	function user_exists($email) {
		$db = get_db_connection();
		$stmt = $db->prepare("SELECT email FROM User WHERE email = :email");
		$stmt->bindParam(':email', $email);
    	$stmt->execute() or die (print_r($stmt->errorInfo(), true));

	    if($stmt->rowCount() > 0){
	        return true;
	    } else {
	        return false;
	    }
	}

	function fill_nav(){
		$db = get_db_connection();

		$cmdCateg = $db->prepare("SELECT * FROM category");
		$cmdBrand = $db->prepare("SELECT DISTINCT b.name AS brandName FROM brand b, product p WHERE b.id=id_Brand AND id_Category=:category");

		$cmdBrand->bindParam(':category', $categ);

		$cmdCateg->execute() or die (print_r($cmdCateg->errorInfo(), true));
		//$cmdBrand->execute() or die (print_r($cmdBrand->errorInfo(), true));

		while ($rowCateg = $cmdCateg->fetch()) {
			echo '
				<li class="mega-menu"><a href="#"><div>'.$rowCateg['name'].'</div></a>
					<div class="mega-menu-content style-2 clearfix">
						<ul>
			';

			$categ = $rowCateg['id'];
			$cmdBrand->execute() or die (print_r($cmdBrand->errorInfo(), true));
			while ($rowBrand = $cmdBrand->fetch()) {
				echo '
					<li><a href="shop.php?Category='.$rowCateg['name'].'&Brand='.$rowBrand['brandName'].'"><div>'.$rowBrand['brandName'].'</div></a>
					</li>
				';
			}
			echo '
						</ul>
					</div>
				</li>

			';
		}
	}

	function get_id_brand($brand){
		$db = get_db_connection();
		$cmd = "SELECT DISTINCT id FROM brand WHERE name=:brand";
		$cmd = $db->prepare($cmd);
		$cmd->bindParam(':brand', $brand);
		$cmd->execute() or die (print_r($cmd->errorInfo(), true));
		$row = $cmd->fetch();
		return $row['id'];
	}

	function get_id_category($category){
		$db = get_db_connection();
		$cmd = "SELECT DISTINCT id FROM category WHERE name=:category";
		$cmd = $db->prepare($cmd);
		$cmd->bindParam(':category', $category);
		$cmd->execute() or die (print_r($cmd->errorInfo(), true));
		$row = $cmd->fetch();
		return $row['id'];
	}

	function fill_shop($categ, $brand){
		$db = get_db_connection();
		if($categ === "" && $brand === ""){
			$cmd = "SELECT * FROM product";
			$cmd = $db->prepare($cmd);
		}
		elseif ($categ === "") {
			$cmd = "SELECT * FROM product WHERE id_Brand=:idBrand";
			$cmd = $db->prepare($cmd);

			$idBrand = get_id_brand($brand);
			$cmd->bindParam(':idBrand', $idBrand);
		}
		elseif ($brand === "") {
			$cmd = "SELECT * FROM product WHERE id_Category=:idCategory";
			$cmd = $db->prepare($cmd);

			$idCategory = get_id_category($categ);
			$cmd->bindParam(':idCategory', $idCategory);
		}
		else{
			$cmd = "SELECT * FROM product WHERE id_Brand=:idBrand AND id_Category=:idCategory";
			$cmd = $db->prepare($cmd);

			$idBrand = get_id_brand($brand);
			$cmd->bindParam(':idBrand', $idBrand);

			$idCategory = get_id_category($categ);
			$cmd->bindParam(':idCategory', $idCategory);
		}

		$cmd->execute() or die (print_r($cmdCateg->errorInfo(), true));

		while ($row = $cmd->fetch()) {
			echo '
				<div class="product clearfix">
							<div class="product-image">
								<a href="#"><img src="images/items/steelseries_6gv2.jpg" alt="Steelseries 6GV2"></a>
								<a href="#"><img src="images/items/steelseries_6gv2.jpg" alt="Steelseries 6GV2"></a>
								<div class="product-overlay">
									<a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
									<a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
								</div>
							</div>
							<div class="product-desc">
								<div class="product-title"><h3><a href="#">'.$row['name'].'</a></h3></div>
								<div class="product-price"><ins>$'.$row['price'].'</ins></div>
								<p>'.$row['description'].'</p>
							</div>
						</div>
			';
		}

		/*<div class="product clearfix">
							<div class="product-image">
								<a href="#"><img src="images/items/steelseries_6gv2.jpg" alt="Steelseries 6GV2"></a>
								<a href="#"><img src="images/items/steelseries_6gv2.jpg" alt="Steelseries 6GV2"></a>
								<div class="sale-flash">50% Off*</div>
								<div class="product-overlay">
									<a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
									<a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
								</div>
							</div>
							<div class="product-desc">
								<div class="product-title"><h3><a href="#">Steelseries 6gv2</a></h3></div>
								<div class="product-price"><del>$24.99</del> <ins>$12.49</ins></div>
								<div class="product-rating">
									<i class="icon-star3"></i>
									<i class="icon-star3"></i>
									<i class="icon-star3"></i>
									<i class="icon-star3"></i>
									<i class="icon-star-half-full"></i>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, sit, exercitationem, consequuntur, assumenda iusto eos commodi alias aut ipsum praesentium officia pariatur doloremque dolor tenetur esse vitae voluptatibus inventore delectus. Eaque laboriosam quaerat accusamus! Porro, laboriosam temporibus dolorum doloremque dolorem ex ducimus recusandae repellat neque sapiente ab numquam rerum deleniti!</p>
								<ul class="iconlist">
									<li><i class="icon-caret-right"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas iure quod, asperiores debitis cum rem tenetur autem praesentium quisquam eligendi doloribus, velit ipsum temporibus esse culpa totam veniam dolorem veritatis!</li>
									<li><i class="icon-caret-right"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed itaque quos delectus a, quis est, fugiat praesentium reprehenderit, numquam explicabo, voluptatum veritatis amet natus fugit vero aliquid nam aperiam inventore.</li>
									<li><i class="icon-caret-right"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore fuga fugit obcaecati nobis veritatis officiis architecto eaque ut hic quae delectus natus, iusto nulla consequatur saepe vel, perspiciatis placeat ab?</li>
									<li><i class="icon-caret-right"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis vel provident obcaecati aliquid mollitia ducimus aut a id similique saepe culpa ut optio debitis distinctio numquam perferendis, consectetur fugit unde.</li>
								</ul>
							</div>
						</div>*/
	}
?>