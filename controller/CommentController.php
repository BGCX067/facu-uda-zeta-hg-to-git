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
		$commentsQty =$this->model->getCountComments();
		$pages =  $commentsQty/$rows;
		$comments = $this->model->getCommentsLimit($rows,$index,$commentsQty);
		$comments = array_reverse($comments);
		$isPaginated = $pages > 1;
		include  'view/comments/comments.php';
	}

	public function newCommentForm(){

		include  'view/comments/commentForm.php';
	}

	public function newComment(){
		$email = $_POST['email'];
		$name = $_POST['name'];
		$message = $_POST['message'];
		$filename = null;
		if ((($_FILES["file"]["type"] == "image/gif")
				|| ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/jpg")
				|| ($_FILES["file"]["type"] == "image/pjpeg"))
				&& ($_FILES["file"]["size"] < 512 * 1024))
		{
			$destination_path = getcwd().DIRECTORY_SEPARATOR."img_recibidas".DIRECTORY_SEPARATOR;
			
			$filename = $email.$_FILES['file']['name'];
			$target_path = $destination_path . basename($filename);
			if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_path)){
			}
				
		}
		
		$result = $this->model->insertComment($name, $email, $message, $filename);
		
		echo "<script language='javascript' type='text/javascript'>window.top.window.getMessage($result);</script>";
	}
	
	public function retrieveComment() {
		$id = $_GET[id];
		
		$comment = $this->model->getComment($id);
		include  'view/comments/comment.php';
	}
}

?>