<?php 

include_once './Persistencia/conexion.php';

class Beca extends db{

	private $idBeca;
	private $descripcion;
	private $id_tipoBeca;

	public function getIdBeca(){
		return $this->idBeca;
	}
	public function getdescripcion(){
		return $this->descripcion;
	}
	public function getid_tipoBeca(){
		return $this->id_tipoBeca;
	}

	//Establecer los valores
	public function setIdBeca($id){
		$this->idBeca = $id;
	}
	public function setdescripcion($desc){
		$this->descripcion = $desc;
	}
	public function setid_tipoBeca($tipobeca){
		$this->id_tipoBeca = $tipobeca;
	}



}


?>