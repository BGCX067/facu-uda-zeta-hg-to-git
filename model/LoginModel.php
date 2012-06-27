<?php 
include_once("model/entity/User.php");
include_once("model/Model.php");
include_once("model/UserModel.php");
include_once("model/ProfileModel.php");

class LoginModel extends Model{
	private $user_model;
	private $profile_model;
	
	function __constructor() {
		$this->user_model = new UserModel();
		$this->profile_model = new ProfileModel();
	}
	
	public function loginNative($email,$pass){
		$user = $this->user_model->getUserByEmail($email);
		if(isset($user)){
			if(strcmp($user->pass,$pass) == 0){
				return $this->profile_model->getProfileByUserId($user->id);
			}else{
				return null;
			}
		}else{
			return null;
		}
	}
	
	public function signUpNative()
	
	
}
?>