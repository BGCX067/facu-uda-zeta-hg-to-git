<?php 
include_once("model/entity/User.php");
include_once("model/Model.php");

class UserModel extends Model {
	
	public function getUserByEmail($email) {
		$query = "SELECT
		`user`.`id`,
		`user`.`username`,
		`user`.`email`,
		`user`.`password`
		FROM `lab3`.`user`
		WHERE `user`.`email` = '$email'";
		  
		$result = $this->db->query($query);
		$user = null;
		if (isset($result)){
			$row = mysql_fetch_object($result);
			$user = new User($row->id, $row->username,$row->email, $row->password);
		}
		return $user;
	}
	
	public function getUserById($id) {
		$query = "SELECT
		`user`.`id`,
		`user`.`username`,
		`user`.`email`,
		`user`.`password`
		FROM `lab3`.`user`
		WHERE `user`.`id` = '$id'";
	
		$result = $this->db->query($query);
		$user = null;
		if (isset($result)){
			$row = mysql_fetch_object($result);
			$user = new User($row->id, $row->username,$row->email, $row->password);
		}
		return $user;
	}
	
	public function addUser($user) {
		$existUser = $this->getUserByEmail($user->email);
		if(isset($existUser)){
			return -1;
		}
		$query = "INSERT INTO user (username,email,password) VALUES('$user->username','$user->email','$password')";	
		$result = $this->db->query($query);
		return mysql_insert_id();
	}
}
?>