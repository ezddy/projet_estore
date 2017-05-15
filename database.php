<?php  
	function get_db_connection() {
		$db = new PDO('mysql:host=localhost:3305;dbname=web_prog','root','root');
		return $db;
	}

	function exec_cmd($sqlCommand) {
		$db = get_db_connection();
		$stmt = $db->prepare($sqlCommand);
		$stmt->execute() or die(print_r($stmt->errorInfo(), true));
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

	function insert_order($shipping_address, $status, $dateOrder, $totalPrice, $user) {
		$db = get_db_connection();
		$db->exec("INSERT INTO Order VALUES(NULL, '$shipping_address', '$status', NULL, '$dateOrder', '$totalPrice', '$user')") or die ("insert order impossible");
	}

	function insert_contains($order, $product) {
		$db = get_db_connection();
		$db->exec("INSERT INTO contains VALUES('$order, '$product')") or die ("insert contains impossible");
	}

	function get_list_category(){
		$db = get_db_connection();
		$db = $db->query("SELECT * FROM category");
		foreach ($db as $row) {
			echo '<option value="'.$row[id_Category].'">'.$row[name].'</option>';
		}
	}

	function get_list_brand(){
		$db = get_db_connection();
		$db = $db->query("SELECT * FROM brand");
		foreach ($db as $row) {
			echo '<option value="'.$row[id_Brand].'">'.$row[name].'</option>';
		}
	}
?>