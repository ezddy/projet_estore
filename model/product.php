<?php 
$path = $_SERVER["DOCUMENT_ROOT"];
$path .= "/database.php";
require_once($path);

class Product {

	private $name;
	private $description;
	private $price;
	private $image;
	private $category;
	private $brand;

	public function __construct($name, $description, $price, $image, $category, $brand) {
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
		$this->image = $image;
		$this->category = $category;
		$this->brand = $brand;
		insert_product($this->name, $this->description, $this->price, $this->image, $this->category, $this->brand);
	}

}

?>