<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$fechaasign = $_GET["fecha"];

$cupoasignacion = $entityManager->createQuery('select u from CuposTickets u where u.fechaasignacion = ?1')
->setParameter(1, $fechaasign)
->getSingleResult();

if ($cupoasignacion === null) {
	echo "No asignacion found.\n";
	exit(1);
}

$cupoticketfound =  array(
	'concecutivo'     => $cupoasignacion->getConsecutivo_cupostickets(),
	'fecha'         => $cupoasignacion->getFechaAsignacion(),
	'cuposalmuerzo'      => $cupoasignacion->getCuposDisponiblesAlmuerzos(),
	'cuposrefrigerio'         => $cupoasignacion->getCuposDisponiblesRefrigerio()
);

echo json_encode($cupoticketfound);