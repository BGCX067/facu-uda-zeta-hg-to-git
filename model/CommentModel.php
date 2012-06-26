<?php 
include_once("model/entity/Comment.php");
include_once("model/Model.php");

class CommentModel extends Model {
	
	/**
	 * Return all comment
	 * @return multitype:Comment 
	 */
	public function getComments() {
		$arr = array();			
		$query = "SELECT 
				`comment`.`id`,
				`comment`.`name`,
				`comment`.`email`,
				`comment`.`message`,
				`comment`.`imageUrl`
				FROM `lab3`.`comment`";
		
		$result = $this->db->query($query);
		if(isset($result)) {
			while ($row = mysql_fetch_object($result)) {
				if(isset($row)){
					$com = new Comment($row->id, $row->name,$row->email, $row->message, $row->imageUrl);
					array_push($arr, $com);
				}
			}
		}
		return $arr;
	}
	
	/**
	 * Find a comment by id and return Comment
	 * @param integer $id
	 * @return Comment
	 */
	public function getComment($id){
		$comment;
		$query =    "SELECT 
					`comment`.`id`,
					`comment`.`name`,
					`comment`.`email`,
					`comment`.`message`,
					`comment`.`imageUrl`
					FROM `lab3`.`comment` where id = $id";
		
		$result = $this->db->query($query);
		if (isset($result)){
			$row = mysql_fetch_object($result);
			$comment = new Comment($row->id, $row->name,$row->email, $row->message, $row->imageUrl);
		}
		return $comment;
	}
	
	public function getCommentsLimit($row_count,$offset,$commentsQty) {
		$from = $commentsQty  - ( $offset * $row_count +  $row_count);
		if($from < 0){
			$from = 0;
		}
		$arr = array();
		$query = "SELECT
				`comment`.`id`,
				`comment`.`name`,
				`comment`.`email`,
				`comment`.`message`,
				`comment`.`imageUrl`
				FROM `lab3`.`comment` limit $from, $row_count";
		
		$result = $this->db->query($query);
		if(isset($result)) {
			$i = 0;
			while ($row = mysql_fetch_object($result)) {
				if(isset($row)){
					$com = new Comment($row->id, $row->name,$row->email, $row->message, $row->imageUrl);
					array_push($arr, $com);
				}
			}
		}
		return $arr;
	}
	
	public function getCountComments(){
		$query = "SELECT count(`comment`.`id`) FROM `lab3`.`comment`";
		
		$result = $this->db->query($query);
		$result = mysql_result($result, 0);
		
		if(!isset($result)) {
			$result = 0;
		}
		return intval($result);
	}
	
	public function insertComment($name,$email,$message,$imageName) {
		$query = "INSERT INTO comment (name,email,message,imageUrl) VALUES('$name','$email','$message','$imageName')";
		$result = $this->db->query($query);
		return mysql_insert_id();
	}
}
?>