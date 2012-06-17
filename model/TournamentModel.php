<?php
include_once("model/entity/Tournament.php");
include_once("model/Model.php");

class TournamentModel extends Model {

	function getTournamentTable($tournament){
		$arr = array();

		$query = "SELECT
		`tournament`.`id`,
		`tournament`.`team`,
		`tournament`.`pg`,
		`tournament`.`pe`,
		`tournament`.`pp`,
		`tournament`.`gf`,
		`tournament`.`gc`,
		`tournament`.`tournament`
		FROM `lab3`.`tournament`
		WHERE `tournament`.`tournament` = '$tournament'";

		$result = $this->db->query($query);
		if(isset($result)) {
			while ($row = mysql_fetch_object($result)) {
				if(isset($row)){
					$t = new Tournament($row->id,$row->team, $row->pg, $row->pp, $row->pe, $row->gf, $row->gc, $row->tournament);
					array_push($arr, $t);	
				}
			}
		}
		uasort($arr,array('Tournament', 'sorter'));
		return $arr;
	}
}