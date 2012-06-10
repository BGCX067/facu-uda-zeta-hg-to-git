<?php 
include_once("model/CommentModel.php");
class CommentController {
	public $model;
	
	public function __construct() {
		$this->model = new CommentModel();
	}
	
	public function listCommnets() {
		$rows = 20;
		$index = 0; 
		if(!empty($_GET['rows'])){
			$rows = $_GET['rows'];
		}
		if(!empty($_GET['index'])){
			$index = $_GET['index'];
		}
		$comments = $this->model->getCommentsLimit($rows,$index);
        include 'view/comments/comments.php';  
	}
}
?>