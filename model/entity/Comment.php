<?php 
class Comment {
	public $id;
	public $name;
	public $email;
	public $message;
	public $imageUrl;

	public function __construct($id,$name,$email,$message,$imageUrl) {
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
		$this->message = $message;
		$this->imageUrl = $imageUrl;
	}
}
?>