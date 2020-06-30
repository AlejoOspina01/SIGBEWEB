<?php 
include_once './Persistencia/conexion.php';
class Periodo extends db{


	private $idperiodoacademico ;
	private $fecha_inicio ;
	private $fecha_fin ;
 
	public function getidperiodoacademico(){
		return $this->idperiodoacademico;
	}

	public function getfecha_inicio(){
		return $this->fecha_inicio;
	}

	public function getfecha_fin(){
		return $this->fecha_fin;
	}

	public function setidperiodoacademico($idperiodo){
		$this->idperiodoacademico = $idperiodo;
	}

	public function setfecha_inicio($fechaini){
		$this->fecha_inicio = $fechaini ;
	}

	public function setfecha_fin($fechafin){
		$this->fecha_fin = $fechafin ;
	}

}



?>