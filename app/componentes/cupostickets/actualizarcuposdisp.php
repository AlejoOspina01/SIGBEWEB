<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdCuposDisp = get_object_vars($request);
$propiedadesSaldoUpdate = get_object_vars($stdCuposDisp['data']);

$cuposticketsbuscada = $entityManager->createQuery('SELECT c from CuposTickets c where c.consecutivo_cupostickets = ?1')
->setParameter(1, $propiedadesSaldoUpdate['conceasign'])
->getSingleResult();

if($propiedadesSaldoUpdate['tipoticket'] == 'Ticket Almuerzo'){
	if(($cuposticketsbuscada->getCuposDisponiblesAlmuerzos() - 1) > 0){
		$cuposTicketsupdate = $entityManager->createQueryBuilder();

		$query = $cuposTicketsupdate->update('CuposTickets', 'u') 
		->set('u.cuposdisponiblesalmuerzo', '?1')
		->set('u.cuposdisponiblesrefrigerio', '?2')
		->where('u.consecutivo_cupostickets = ?3')
		->setParameter(1, $cuposticketsbuscada->getCuposDisponiblesAlmuerzos() - 1 )
		->setParameter(2, $cuposticketsbuscada->getCuposDisponiblesRefrigerio() )
		->setParameter(3, $propiedadesSaldoUpdate['conceasign'])
		->getQuery();        
		$execute = $query->execute();
	}else{
		echo "No hay cupos disponibles";
	}
}else{
	if(($cuposticketsbuscada->getCuposDisponiblesRefrigerio() - 1) > 0){
		$cuposTicketsupdate = $entityManager->createQueryBuilder();

		$query = $cuposTicketsupdate->update('CuposTickets', 'u') 
		->set('u.cuposdisponiblesalmuerzo', '?1')
		->set('u.cuposdisponiblesrefrigerio', '?2')
		->where('u.consecutivo_cupostickets = ?3')
		->setParameter(1, $cuposticketsbuscada->getCuposDisponiblesAlmuerzos() )
		->setParameter(2, $cuposticketsbuscada->getCuposDisponiblesRefrigerio() - 1)
		->setParameter(3, $propiedadesSaldoUpdate['conceasign'])
		->getQuery();        
		$execute = $query->execute();
	}else{
		echo "No hay cupos disponibles";
	}
}

