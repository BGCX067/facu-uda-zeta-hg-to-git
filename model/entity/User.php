<?php 

class User extends EntityBase {
	public const FUBICA = 1;
    public const GOOGLE = 2;
	
	public $username;
	public $email;
	public $password;
	//FUBICA,GOOGLE
	public $user_type;
	public $hash;
	public $activate;
	
	
	function __construct($id,$username,$email,$password,$user_type=self::FUBICA,$hash,$activate) {
		parent::__construct($id);
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->hash = $hash;
		$this->activate = $activate;
	}
}
?>