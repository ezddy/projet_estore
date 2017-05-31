<?php 
$path = $_SERVER["DOCUMENT_ROOT"];
$path .= "/database.php";
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
			case 4:
				$this->status = "pending";
				$this->shipping_address = $args[0];
				$this->dateOrder = date("Y-m-d");
				$this->user = $args[1];
				$this->totalPrice = $args[2];
				$items = $args[3];
				$id_order = insert_order($this->shipping_address, $this->status, $this->dateOrder, $this->totalPrice, $this->user);
				foreach($items as $row) {
					insert_contains($id_order, $row);
				}
		}
	}
}
 


?>

