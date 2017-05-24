<?php	
$path = $_SERVER["DOCUMENT_ROOT"];
$path .= "/database.php";
require_once($path);
class User {
	private $email;
	private $password;
	private $firstname;
	private $lastname;
	private $address;
	private $phone;
	private $city;
	private $zipcode;
	private $role;

	public function __construct() {
		$cpt = func_num_args();
		$args = func_get_args();
		switch($cpt) {
			// Get the user object after identification 
			case 1: 
				$this->email = $args[0];
				$result = query_cmd("SELECT * FROM User WHERE email='$this->email'")->fetch();
				$this->firstname = $result['firstname'];
				$this->lastname = $result['lastname'];
				$this->address = $result['address'];
				$this->phone = $result['phone'];
				$this->city = $result['city'];
				$this->zipcode = $result['zipcode'];
				$this->role = $result['role'];
				$this->password = $result['password'];
				break;

			// Registration
			case 9:
				$this->email = $args[0];
				$this->password = $args[1];
				$this->address = $args[2];
				$this->phone = $args[3];
				$this->city = $args[4];
				$this->zipcode = $args[5];
				$this->lastname = $args[6];
				$this->firstname = $args[7];
				$this->role = $args[8];
				insert_user($this->email, $this->password, $this->address, $this->phone, $this->city, $this->zipcode, $this->lastname, $this->firstname, $this->role);


		}
	}

	public function getLastname() {
		return $this->lastname;
	}

	public function getFirstname() {
		return $this->firstname;
	}


	public function logout() {
		session_destroy();
	}
}

?>