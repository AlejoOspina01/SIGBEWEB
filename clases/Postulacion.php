<?php 

include_once './Persistencia/conexion.php';

class Postulacion extends db{
	private $id_postulacion;
	private $identificacion;
	private $idConvocatoria;
	private $promedio;
	private $fechapostulacion;
	private $comentpsicologia;
	private $estado_postulacion;

	public function getIdpostulacion(){
		return $this->id_postulacion ;
	}
	public function getidentfiicacion(){
		return $this->identificacion ;
	}
	public function getidconvocatoria(){
		return $this->idConvocatoria ;
	}
	public function getpromedio(){
		return $this->promedio ;
	}
	public function getfechapostulacion(){
		return $this->fechapostulacion ;
	}
	public function getcomentpsicologia(){
		return $this->comentpsicologia ;
	}
	public function getestadopostulacion(){
		return $this->estado_postulacion;
	}

//Establecer valores
	public function setIdpostulacion($post){
		return $this->id_postulacion = $post;
	}
	public function setidentfiicacion($identificacion){
		return $this->identificacion = $identificacion ;
	}
	public function setidconvocatoria($idConvocatoria){
		return $this->idConvocatoria = $idConvocatoria ;
	}
	public function setpromedio($promedio){
		return $this->promedio = $promedio ;
	}
	public function setfechapostulacion($fechapostulacion){
		return $this->fechapostulacion = $fechapostulacion;
	}
	public function setcomentpsicologia($comentpsicologia){
		return $this->comentpsicologia = $comentpsicologia;
	}
	public function setestadopostulacion($idestadopostulacion){
		return $this->estado_postulacion = $idestadopostulacion;
	}
}

?>