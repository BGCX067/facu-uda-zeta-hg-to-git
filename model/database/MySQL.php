<?php 
class MySQL {
	
	private $conexion;
	private $total_consultas;
	
	public function MySQL(){
		if(!isset($this->conexion)){
			$this->conexion = (mysql_connect("localhost","root","31284081"))
			or die(mysql_error());
			mysql_select_db("lab3",$this->conexion) or die(mysql_error());
		}
	}
	
	public function query($consulta){
		$this->total_consultas++;
		$resultado = mysql_query($consulta,$this->conexion);
		if(!$resultado){
			echo 'MySQL Error: ' . mysql_error();
			exit;
		}
		return $resultado;
	}
	
	public function fetch_array($result){
		return mysql_fetch_array($result);
	}
	
	public function fetch_object($result,$class_name){
		return mysql_fetch_object($result,$class_name);
	}
	
	public function num_rows($consulta){
		return mysql_num_rows($consulta);
	}
	
		
}?>