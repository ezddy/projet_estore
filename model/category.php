<?php 
$path = $_SERVER["DOCUMENT_ROOT"];
$path .= "projet_estore/database.php";
require_once($path);

class Category{
	private $name;

	public function __construct($name) {
		$this->name = $name;
		insert_category($this->name);
	}
}

?>