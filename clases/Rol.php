<?php 
include_once './Persistencia/conexion.php';
class Rol extends db{


	private $idRol ;
	private $descripcion ;
 
	public function getidRol(){
		return $this->idRol;
	}

	public function getdescripcion(){
		return $this->descripcion;
	}

	public function setidRol($idrol){
		$this->idRol = $idrol;
	}

	public function setdescripcion($desc){
		$this->descripcion = $desc ;
	}



}



?>