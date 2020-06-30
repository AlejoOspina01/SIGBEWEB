<?php 

include_once './Persistencia/conexion.php';

class TicketDao extends db{

	public function buscarTickets(){
		$query = $this->connect()->query('SELECT * FROM tickets');
		return $query;
	}

	public function buscarUltimoTicketUsuario($identi){
		$ticketsBuscadas = $this->connect()->prepare('SELECT MAX(idTicket)idTicket FROM tickets WHERE identificacion = :identificacion');
		$ticketsBuscadas->execute(['identificacion' => $identi]);
		$tickbusc = $ticketsBuscadas->fetch();

		return $tickbusc;
	}

	public function buscarTicketFechaIdenti($fecha, $identi){
		$ticketsBuscadas = $this->connect()->prepare('SELECT * FROM tickets where fechacompra = :fechacompra AND identificacion = :identificacion');
		$ticketsBuscadas->execute(['fechacompra' => $fecha, 'identificacion' => $identi]);

		$tickbusc = $ticketsBuscadas->fetch();

		if($tickbusc){
			return true;
		}else{
			return false;
		}
	}


	public function registrarTicket($ticket){
			$query = $this->connect()->prepare('INSERT INTO tickets (fechacompra,identificacion) VALUES(:fechacompra, :identificacion)');
			
			if($query->execute(['fechacompra' => $ticket->getfechacompra(),
				'identificacion' => $ticket->getidentificacion()])){			
				return true;

		}else{

			return false;
		}
	}
}
?>