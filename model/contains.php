<?php 
$path = $_SERVER["DOCUMENT_ROOT"];
$path .= "/database.php";
require_once($path);

class Contains {
	private $order;
	private $product;

	public function __construct($order, $product) {
		$this->order = $order;
		$this->product = $product;

		insert_contains($this->order, $this->product);
	}
}

 ?>