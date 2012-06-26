<?php 
abstract class EntityBase {
	public  $id;
	
	function __construct($id) {
		$this->id = $id;
	}
}
?>