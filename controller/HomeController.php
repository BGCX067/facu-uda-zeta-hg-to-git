<?php 
class HomeController { 
	
	public function __construct() {
	}
	
	public function home() {
		include 'view/home/home.php';
	}
	
	public function menu() {
		include 'view/home/menu.php';
	}
	public function about() {
		include 'view/home/about.html';
	}
	public function contactme() {
		include 'view/home/inConstruct.html';
	}
	public function price() {
		include 'view/home/inConstruct.html';
	}
	
}
?>