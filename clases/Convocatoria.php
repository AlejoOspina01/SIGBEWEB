<?php 

include_once './Persistencia/conexion.php';

class Convocatoria extends db{

	private $idconvocatoria;
	private $fechahora_inicio;
	private $fechahora_final;
	private $estado_convocatoria;
	private $idBeca;
	private $idperiodoAcademico;
	private $cupos;

	public function getIdConvocatoria(){
		return $this->idconvocatoria;
	} 
	public function getfechahora_inicio(){
		return $this->fechahora_inicio;
	}
	public function getfechahora_final(){
		return $this->fechahora_final;
	}
	public function getestado_convocatoria(){
		return $this->estado_convocatoria;
	}
	public function getidBeca(){
		return $this->idBeca;
	}
	public function getidperiodoAcademico(){
		return $this->idperiodoAcademico;
	}
	public function getcupos(){
		return $this->cupos;
	}
	
	//Establecer valores
	public function setIdConvocatoria($idconvo){
		$this->idconvocatoria = $idconvo;
	}
	public function setfechahora_inicio($idfechaini){
		$this->fechahora_inicio = $idfechaini;
	}
	public function setfechahora_final($fechafin){
		$this->fechahora_final = $fechafin;
	}
	public function setestado_convocatoria($estadoconvo){
		$this->estado_convocatoria = $estadoconvo;
	}
	public function setidBeca($idbeca){
		$this->idBeca = $idbeca;
	}
	public function setidperiodoAcademico($idperiodo){
		$this->idperiodoAcademico = $idperiodo;
	}
	public function setcupos($cupos){
		$this->cupos = $cupos;
	}



}




?>