<?php 

include_once './Daos/TicketDao.php';

class TicketControl{
	private $ticketDao;

	public function __construct() {
		 $this->ticketDao = new TicketDao();
	}
	
	public function buscarTicketFechaIdenti($fecha, $identi){
		return $this->ticketDao->buscarTicketFechaIdenti($fecha,$identi);
	}

	public function registrarTicket($ticket){
		return $this->ticketDao->registrarTicket($ticket);
	}

	public function buscarTickets(){
		return $this->ticketDao->buscarTickets();
	}

	public function buscarUltimoTicketUsuario($identi){ 
		return $this->ticketDao->buscarUltimoTicketUsuario($identi);
	}

	

}


 ?>