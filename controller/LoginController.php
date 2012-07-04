<?php 
include_once 'model/LoginModel.php';
	class LoginController {
		private $model;
		
		public function __construct(){
			$this->model = new LoginModel();
		}

		public function loginPage() {
			$status = $_GET['status'];
			if(!isset($status)){
				$status = "";
			}
			include 'view/login/loginPage.php';
		}
		public function login() {
			$email = "";
			$pass = "";
			if(isset($_POST['email']))
				$email = $_POST['email'];
			if(isset($_POST['pass']))
				$pass = $_POST['pass'];
			
			$user = $this->model->loginNative($email, $pass);
			if(isset($user)){
				$_SESSION['user'] = serialize($user);
				header("Location: index.php");
			}else{
				header("Location: index.php?status=failed");
			}
		}
		
		public function loginGoogle() {
			//;
		}		
		public function logout() {
			// vaciarla
			$_SESSION['user'] = null;
			session_destroy();
			session_start();
			include 'view/login/loginPage.php';
		}		
	}
?>
