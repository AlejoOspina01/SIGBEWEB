<?php 

include_once './Persistencia/conexion.php';

class Ticket extends db{
	
	private $idTicket ;
	private $fechacompra ;
	private $identificacion ;
	private $estado_ticket;

	public function getidTicket(){
		return $this->idTicket;
	}

	public function getfechacompra(){
		return $this->fechacompra;
	}

	public function getidentificacion(){
		return $this->identificacion;
	}

	public function getestado_ticket(){
		return $this->estado_ticket;
	}

	//Establecer valores
	public function setidTicket($idtick){
		$this->idTicket = $idtick;
	}

	public function setfechacompra($fechacom){
		$this->fechacompra = $fechacom;
	}

	public function setidentificacion($identi){
		$this->identificacion = $identi ;
	}

	public function setestado_ticket($estadoticket){
		$this->estado_ticket = $estadoticket ;
	}


}



?>