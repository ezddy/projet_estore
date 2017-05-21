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
		$sqlCommand = "INSERT INTO User VALUES(NULL, '$email', '$encryptedPW', '$address', '$phone', '$city', '$zipcode', '$lastname', '$firstname', '$salt', '$role')";
		exec_cmd($sqlCommand);

		if($role === "pending_user") {
			$link = 'http://localhost:8888/verify.php?user='.$email.'&token='.$encryptedPW;
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
		$db->exec("INSERT INTO Category VALUES(NULL, '$name')") or die ("insert category impossible");
	}

	// A refaire pour match avec la nouvelle DB
	function insert_order($shipping_address, $status, $dateOrder, $totalPrice, $user) {
		$db = get_db_connection();
		$db->exec("INSERT INTO Orders VALUES(NULL, '$shipping_address', '$status', NULL, '$dateOrder', '$totalPrice', '$user')") or die (print_r($db->errorInfo(), true));
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