<?php 
include_once 'entity/User.php';
include_once 'Model.php';
include_once 'UserModel.php';

class LoginModel extends Model{
	private $user_model;
	
	public function __construct() {
		parent::__construct();
		$this->user_model = new UserModel();
	}
	
	public function loginNative($email,$pass){
		$user = $this->user_model->getUserByEmail($email);
		if(isset($user)){
			if(strcmp($user->password,$pass) == 0){
				return $user;
			}else{
				return null;
			}
		}else{
			return null;
		}
	}
	
	public function signUpNative(){
		
	}
	
	
}
?>