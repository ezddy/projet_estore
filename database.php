<?php 
	$path = $_SERVER["DOCUMENT_ROOT"];
	$path .= '/controller/mail.php';
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
			$link = 'http://138.197.157.12/verify.php?user='.$email.'&token='.$hash;
			send_email($email, 'E-mail verification from eStore', 'Verify your account by clicking on this link : ' . $link);
		}
	}

	function insert_product($name, $description, $price, $image, $category, $brand) {
		$db = get_db_connection();
		$stmt = $db->prepare("INSERT INTO Product (name, description, price, image, id_Category, id_Brand) VALUES(:name, :description, :price, :image, :category, :brand)");
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':price', $price);
		$stmt->bindParam(':image', $image);
		$stmt->bindParam(':category', $category);
		$stmt->bindParam(':brand', $brand);
		$stmt->execute() or die (print_r($stmt->errorInfo(),true));
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
		//return $db->lastInsertId();
	}

	function insert_contains($order, $product) {
		$db = get_db_connection();
		$stmt = $db->prepare("INSERT INTO contains(id, id_Orders) VALUES(:product, :order)");
		$stmt->bindParam(':order', $order);
		$stmt->bindParam(':product', $product);
		$stmt->execute() or die (print_r($stmt->errorInfo(),true));
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


	function retrieve_brands() {
		$db = get_db_connection();
		$stmt = $db->prepare("SELECT * FROM Brand");
		$stmt->execute() or die ('retrieve brands impossible');
		return $stmt->fetchAll();
	}

	function retrieve_category() {
		$db = get_db_connection();
		$stmt = $db->prepare("SELECT * FROM Category");
		$stmt->execute() or die ('retrieve category impossible');
		return $stmt->fetchAll();
	}

	function fill_nav(){
		$db = get_db_connection();

		$cmdCateg = $db->prepare("SELECT * FROM Category");
		$cmdBrand = $db->prepare("SELECT DISTINCT b.name AS brandName FROM Brand b, Product p WHERE b.id=id_Brand AND id_Category=:category");

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
					<li><a href="shop.php?category='.$rowCateg['name'].'&brand='.$rowBrand['brandName'].'"><div>'.$rowBrand['brandName'].'</div></a>
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
		$cmd = "SELECT DISTINCT id FROM Brand WHERE name=:brand";
		$cmd = $db->prepare($cmd);
		$cmd->bindParam(':brand', $brand);
		$cmd->execute() or die (print_r($cmd->errorInfo(), true));
		$row = $cmd->fetch();
		return $row['id'];
	}

	function get_id_category($category){
		$db = get_db_connection();
		$cmd = "SELECT DISTINCT id FROM Category WHERE name=:category";
		$cmd = $db->prepare($cmd);
		$cmd->bindParam(':category', $category);
		$cmd->execute() or die (print_r($cmd->errorInfo(), true));
		$row = $cmd->fetch();
		return $row['id'];
	}

	function fill_shop($categ, $brand){
		$db = get_db_connection();
		if($categ === "" && $brand === ""){
			$cmd = $db->prepare("SELECT * FROM Product");
		}
		elseif ($categ === "") {
			$cmd = $db->prepare("SELECT * FROM Product WHERE id_Brand=:idBrand");
			$idBrand = get_id_brand($brand);
			$cmd->bindParam(':idBrand', $idBrand);
		}
		elseif ($brand === "") {
			$cmd = $db->prepare("SELECT * FROM Product WHERE id_Category=:idCategory");
			$idCategory = get_id_category($categ);
			$cmd->bindParam(':idCategory', $idCategory);
		}
		else{
			$cmd = $db->prepare("SELECT * FROM Product WHERE id_Brand=:idBrand AND id_Category=:idCategory");

			$idBrand = get_id_brand($brand);
			$cmd->bindParam(':idBrand', $idBrand);

			$idCategory = get_id_category($categ);
			$cmd->bindParam(':idCategory', $idCategory);
		}

		$cmd->execute() or die (print_r($cmdCateg->errorInfo(), true));
		$result = $cmd->fetchAll();
		foreach($result as $row) {
			echo '
				<div class="product clearfix">
							<div class="product-image">
								<a href="#"><img src="'.$row['image'].'" alt="'.$row['name'].'"></a>
								<a href="#"><img src="'.$row['image'].'" alt="'.$row['name'].'"></a>
								<div class="product-overlay">
									<a onclick="cart('.$row['id'].')" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
									<a class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
								</div>
							</div>
							<div class="product-desc">
								<div class="product-title"><h3><a href="#">'.$row['name'].'</a></h3></div>
								<div class="product-price"><ins>$'.$row['price'].'</ins></div>
								<p>'.$row['description'].'</p>
							</div>
						</div>';
		}

		
	}
?>