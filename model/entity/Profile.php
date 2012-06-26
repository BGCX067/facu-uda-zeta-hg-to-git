<?php
class Profile extends EntityBase {
	public $firstname;
	public $lastname;
	public $avatar;
	public $birthday;
	public $user;
	
	function __construct($id,$firstname,$lastname,$avatar,$birthday) {
		parent::__construct($id);
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->avatar = $avatar;
		$this->birthday = $birthday;
	}
	
	
}