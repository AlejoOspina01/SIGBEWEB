<?php
// rol.php <name>
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdAsign = get_object_vars($request);
$propiedadesAsign = get_object_vars($stdAsign['data']);

$fecha = new DateTime($propiedadesAsign['fecha']);
$fechaformat = $fecha->format("Y-m-d");
try{
	$cupoasignacion = $entityManager->createQuery('select u from CuposTickets u where u.fechaasignacion = ?1')
	->setParameter(1, $fechaformat)
	->getSingleResult();
	echo "Ya hay una asignación con esa fecha ingresada";
}catch(Doctrine\ORM\NoResultException $ex){
	$cupoTicket = new CuposTickets();
	$cupoTicket->setFechaAsignacion($fecha);
	$cupoTicket->setCuposDisponiblesAlmuerzo($propiedadesAsign['cuposalmuerzo']);
	$cupoTicket->setCuposDisponiblesRefrigerio($propiedadesAsign['cuposrefrigerio']);

	$entityManager->persist($cupoTicket);
	$entityManager->flush();
}

