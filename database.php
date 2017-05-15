<?php  
	function get_db_connection() {
		$db = new PDO('mysql:host=localhost:8889;dbname=web_prog','root','root');
		return $db;
	}

	function exec_cmd($sqlCommand) {
		$db = get_db_connection();
		$stmt = $db->prepare($sqlCommand);
		$stmt->execute() or die(print_r($stmt->errorInfo(), true));
	}
	function insert_user($email, $password, $address, $phone, $city, $zipcode, $lastname, $firstname) {
		$sqlCommand = "INSERT INTO User VALUES(NULL, '$email', '$password', '$address', '$phone', '$city', '$zipcode', '$lastname', '$firstname')";
		exec_cmd($sqlCommand);
	}
	function insert_product($name, $description, $price, $image, $category, $brand) {
		$db = get_db_connection();
		$db->exec("INSERT INTO Product VALUES(NULL, '$name', '$description', '$price', '$image', '$id_cat', '$id_brand')") or die("insert product impossible");
	}

	function insert_brand($name) {
		$db = get_db_connection();
		$db->exec("INSERT INTO Brand VALUES(NULL, '$name')") or die ("insert brand impossible");
	}

	function insert_category($name) {
		$db = get_db_connection();
		$db->exec("INSERT INTO Category VALUES(NULL, '$name')") or die ("insert category impossible");
	}

	function insert_order($shipping_address, $status, $dateOrder, $totalPrice, $user) {
		$db = get_db_connection();
		$db->exec("INSERT INTO Orders VALUES(NULL, '$shipping_address', '$status', NULL, '$dateOrder', '$totalPrice', '$user')") or die (print_r($db->errorInfo(), true));
	}

	function insert_contains($order, $product) {
		$db = get_db_connection();
		$db->exec("INSERT INTO contains VALUES('$order, '$product')") or die ("insert contains impossible");
	}

?>