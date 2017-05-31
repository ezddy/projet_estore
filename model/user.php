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
		$db = get_db_connection();
		$cmd = "SELECT lastname FROM user WHERE email=:email";
		$cmd = $db->prepare($cmd);
		$cmd->bindParam(':email', $this->email);
		$cmd->execute();
		$cmd = $cmd->fetch();

		return $cmd['lastname'];
	}

	public function getFirstname() {
		$db = get_db_connection();
		$cmd = "SELECT firstname FROM user WHERE email=:email";
		$cmd = $db->prepare($cmd);
		$cmd->bindParam(':email', $this->email);
		$cmd->execute();
		$cmd = $cmd->fetch();

		return $cmd['firstname'];
	}

	public function getMail() {
		return $this->email;
	}

	public function getRole() {
		return $this->role;
	}

	public function logout() {
		session_destroy();
	}

	public function get_last_5_orders(){
		$email = $this->email;
		$cmd = "SELECT status, dateDelivery, dateOrder, totalPrice FROM orders o, user u WHERE u.id=id_User AND email='".$email."' ORDER BY dateOrder DESC LIMIT 5";

		$cmd = query_cmd($cmd);

		foreach ($cmd as $row) {
			echo "
			<tr>
				<td>
					<code>".$row['dateOrder']."</code>
				</td>
				<td>".$row['status']."</td>
			</tr>
				";
		}
	}

	public function get_orders(){
		$email = $this->email;
		$cmd = "SELECT status, shipping_address, dateDelivery, dateOrder FROM orders o, user u WHERE u.id=id_User AND email='".$email."' ORDER BY dateOrder DESC";
		$cmd = query_cmd($cmd);

		foreach ($cmd as $row) {
			if($row['dateDelivery'] === NULL){
				$dateDelivery = "Not delivered yet";
			}
			else{
				$dateDelivery = $row['dateDelivery'];
			}

			echo "
				<tr>
					<td>
						<code>".$row['dateOrder']."</code>
					</td>
					<td>
						<code>".$dateDelivery."</code>
					</td>
					<td>".$row['status']."</td>
					<td>".$row['shipping_address']."</td>
				</tr>
				";
		}
	}

	public function get_user_info(){
		$email = $this->email;
		$db = get_db_connection();
		$cmd = "SELECT firstname, lastname, address, city, zipcode FROM user WHERE email=:email";
		$cmd = $db->prepare($cmd);
		$cmd->bindParam(':email', $email);
		$cmd->execute() or die (print_r($cmd->errorInfo(), true));

		$cmd = $cmd->fetch();

		echo '
		<div class="col_full">
			<label for="first-name">First name:</label>
			<input type="text" id="first-name" name="first-name" class="form-control" value="'.$cmd['firstname'].'"/>

			<label for="last-name">Last name:</label>
			<input type="text" id="last-name" name="last-name" class="form-control" value="'.$cmd['lastname'].'"/>

			<label for="address">Address:</label>
			<input type="text" id="address" name="address" class="form-control" value="'.$cmd['address'].'"/>

			<label for="city">City:</label>
			<input type="text" id="city" name="city" class="form-control" value="'.$cmd['city'].'"/>

			<label for="zip">Zip code:</label>
			<input type="text" id="zip" name="zip" class="form-control" value="'.$cmd['zipcode'].'"/>

			<input type="hidden" id="mail" name="mail" value="'.$email.'"/>

		</div>
		<div class="col_full nobottommargin">
			<button class="button button-3d button-black nomargin" id="category-form-submit" name="category-form-submit" value="Update">Update</button>
		</div>
		';

	}

}

?>