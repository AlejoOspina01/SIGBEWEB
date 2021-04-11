<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$asignaciones = $entityManager->createQueryBuilder()
->select('asg.consecutivo_cupostickets, asg.fechaasignacion','asg.cuposdisponiblesalmuerzo','asg.cuposdisponiblesrefrigerio')  // select * 
->from('CuposTickets', 'asg') // from Usuarios u 
->getQuery()
->getArrayResult();

if ($asignaciones === null) {
	echo "No hay tipo becas.\n";
	exit(1);
}

echo json_encode($asignaciones);