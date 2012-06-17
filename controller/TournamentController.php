<?php 
include 'model/TournamentModel.php';
class TournamentController { 
	public $model;
	
	public function __construct() {
		$this->model = new TournamentModel();	
	}
	
	public function menu() {
		include 'view/tournament/tournamentMenu.html';
	}
	
	public function positions() {
		$tourn = $_GET['tournament'];
		$tournaments = $this->model->getTournamentTable($tourn);
		include 'view/tournament/tournamentPositions.php';
	}
}
?>