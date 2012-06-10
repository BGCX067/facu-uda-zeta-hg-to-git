<?php
include_once("model/database/MySQL.php");
 
abstract class Model {
	
	protected $db;
	
	public function __construct(){
		$this->db = new MySQL();		
	}
	
	
}
?>