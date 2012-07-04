<?php 
include_once 'EntityBase.php';
class User extends EntityBase {
	public $username;
	public $email;
	public $password;
// 	//FUBICA,GOOGLE
// 	public $user_type;
// 	public $hash;
// 	public $activate;
	
	
// 	function __construct($id,$username,$email,$password,$user_type=self::FUBICA,$hash,$activate) {
	public function __construct($id,$username,$email,$password) {
		parent::__construct($id);
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
	}
}
?>