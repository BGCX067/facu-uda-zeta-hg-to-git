<?php 
include_once("model/entity/Profile.php");
include_once("model/Model.php");
include_once("model/UserModel.php");

class ProfileModel extends Model {
	
	public function getProfileByUserId($user_id) {
		$query = "SELECT
		`profile`.`id`,
		`profile`.`firstname`,
		`profile`.`lastname`,
		`profile`.`avatar`,
		`profile`.`birthday`,
		`user`.`id` as user_id,
		`user`.`username`,
		`user`.`email`,
		`user`.`password`,
		`user`.`user_type`
		FROM `lab3`.`profile` INNER JOIN `lab3`.`user` ON `lab3`.`profile`.`user_id` = `lab3`.`user`.`id`
		WHERE `user`.`id` = $user_id";
		  
		$result = $this->db->query($query);
		$profile = null;
		if (isset($result)){
			$row = mysql_fetch_object($result);
			$profile = self::convertObjectToProfile($row);
			$profile->user = UserModel::convertObjectToUser($row,'user_id');
		}
		return $profile;
	}
	
	public function getProfileById($id) {
		$query = "SELECT
		`profile`.`id`,
		`profile`.`firstname`,
		`profile`.`lastname`,
		`profile`.`avatar`,
		`profile`.`birthday`,
		`user`.`id` as user_id,
		`user`.`username`,
		`user`.`email`,
		`user`.`password`,
		 user`.`user_type`
		FROM `lab3`.`profile` INNER JOIN `lab3`.`user` ON `lab3`.`profile`.`user_id` = `lab3`.`user`.`id`
		WHERE `profile`.`id` = '$id'";
	
		$result = $this->db->query($query);
		$profile = null;
		if (isset($result)){
			$row = mysql_fetch_object($result);
			$profile = self::convertObjectToProfile($row);
			$profile->user = UserModel::convertObjectToUser($row,'user_id');
		}
		return $profile;
	}
	
	public function addProfile($profile) {
		$existProfile = $this->getProfileByEmail($profile->email);
		if(isset($existProfile)){
			return -1;
		}
		$query = "INSERT INTO profile (firstname,lastname,avatar,birthday,user_id) VALUES('$profile->firstname','$profile->lastname','$profile->avatar','$profile->birthday',$profile->user->id)";	
		$result = $this->db->query($query);
		return mysql_insert_id();
	}
	
	public static function convertObjectToProfile($row) {
		return new Profile($row->id, $row->firstname,$row->lastname, $row->avatar, $row->birthday);
	}
}
?>