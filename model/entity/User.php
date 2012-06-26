<?php 
class User extends EntityBase {
	public $username;
	public $email;
	public $password;
	
	function __construct($id,$username,$email,$password) {
		parent::__construct($id);
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
	}
}
?>