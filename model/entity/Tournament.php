<?php 
	class Tournament {
		public $id;
		public $team;
		public $PG;
		public $PP;
		public $PE;
		public $GF;
		public $GC;
		public $tournament;
		
		function __construct($id,$team,$PG,$PP,$PE,$GF,$GC,$tournament){
			$this->id = $id;
			$this->team = $team;
			$this->PG = $PG;
			$this->PP = $PP;
			$this->PE = $PE;
			$this->GF = $GF;
			$this->GC = $GC;
			$this->tournament = $tournament;
		}
		
		public function getPoints() {
			return $this->PG * 3 + $this->PE * 1; 
		}
		
		public function getPJ() {
			return $this->PG  + $this->PE + $this->PP;
		}
		
		public function getDF(){
			return $this->GF - $this->GC;
		}
		
		public function sorter($a,$b )
		{
			if(is_a($a, 'Tournament') && is_a($b, 'Tournament') ){
				if($a->getPoints()==$b->getPoints()){
					return  0;
				}
				return  $a->getPoints() < $b->getPoints();
			}else{
				return 	0;
			}
		}
	}
?>
