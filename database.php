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
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':phone', $phone);
		$stmt->bindParam(':city', $city);

		if($role === "pending_user") {
			$link = 'http://localhost:8888/verify.php?user='.$email.'&token='.$hash;
			send_email($email, 'E-mail verification from eStore', 'Verify your account by clicking on this link : ' . $link);
		}
	}

	function insert_product($name, $description, $price, $image, $category, $brand) {
		echo "$name <br>";
		echo "$description <br>";
		echo "$price <br>";
		echo "$image <br>";
		echo "$category <br>";
		echo "$brand <br>";
		$db = get_db_connection();
		$db->exec("INSERT INTO Product VALUES(NULL, '$name', '$description', '$price', '$image', '$category', '$brand')") or die("insert product impossible");
	}

	function insert_brand($name) {
		$db = get_db_connection();
		$db->exec("INSERT INTO Brand VALUES(NULL, '$name')") or die ("insert brand impossible");
	}

	function insert_category($name) {
		$db = get_db_connection();
		$stmt = $db->prepare("INSERT INTO Category (name) VALUES(:name)");
		$stmt->bindParam(':name', $name);
		$stmt->execute() or die ('insert category impossible');
	}

	// A refaire pour match avec la nouvelle DB
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
		$db->exec("INSERT INTO contains VALUES('$order, '$product')") or die ("insert contains impossible");
	}

	function get_list_category(){
		$db = get_db_connection();
		$db = $db->query("SELECT * FROM Category");
		foreach ($db as $row) {
			echo '<option value="'.$row[id].'">'.$row[name].'</option>';
		}
	}

	function get_list_brand(){
		$db = get_db_connection();
		$db = $db->query("SELECT * FROM Brand");
		foreach ($db as $row) {
			echo '<option value="'.$row[id].'">'.$row[name].'</option>';
		}
	}

	function user_exists($email) {
		$db = get_db_connection();
		$stmt = $db->prepare("SELECT email FROM User WHERE email = '$email'");
    	$stmt->execute() or die (print_r($stmt->errorInfo(), true));

	    if($stmt->rowCount() > 0){
	        return true;
	    } else {
	        return false;
	    }
	}
?>