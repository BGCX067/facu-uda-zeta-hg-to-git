<?php 
include_once("model/entity/Comment.php");
include_once("model/Model.php");

class CommentModel extends Model {
	
	/**
	 * Return all comment
	 * @return multitype:Comment 
	 */
	public function getComments() {
		$arr[] = array();			
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
					$arr[$row->id] = new Comment($row->id, $row->name,$row->email, $row->message, $row->imageUrl);
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
	
	public function getCommentsLimit($row_count,$offset) {
		$from = $offset * $row_count;
		$arr[] = array();
		$query = "SELECT
				`comment`.`id`,
				`comment`.`name`,
				`comment`.`email`,
				`comment`.`message`,
				`comment`.`imageUrl`
				FROM `lab3`.`comment` limit $from, $row_count";

		$result = $this->db->query($query);
		if(isset($result)) {
			while ($row = mysql_fetch_object($result)) {
				if(isset($row)){
					$arr[$row->id] = new Comment($row->id, $row->name,$row->email, $row->message, $row->imageUrl);
				}
			}
		}
		return $arr;
	}
	
}
?>