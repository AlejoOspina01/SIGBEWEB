<?php 

class TipoBecas extends db{

	private $idtipobeca ;
	private $descripcion ;
 
	public function getidtipobeca(){
		return $this->idtipobeca;
	}

	public function getdescripcion(){
		return $this->descripcion;
	}

	public function setidtipobeca($idtipob){
		$this->idtipobeca = $idtipob;
	}

	public function setdescripcion($desc){
		$this->descripcion = $desc ;
	}

}



?>