<?php 
$path = $_SERVER["DOCUMENT_ROOT"];
$path .= "projet_estore/database.php";
require_once($path);

class Orders {
	private $status;
	private $shipping_address;
	private $dateOrder;
	private $dateDelivery;
	private $user;
	private $totalPrice;

	public function __construct() {
		$cpt = func_num_args();
		$args = func_get_args();

		switch($cpt) {
			// Insert order
			case 3:
				$this->status = "pending";
				$this->shipping_address = $args[0];
				$this->dateOrder = date();
				$this->user = $args[1];
				$this->totalPrice = $args[2];
		}
	}
}
 


?>

