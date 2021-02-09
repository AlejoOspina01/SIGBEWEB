<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once "../../../bootstrap.php";

$asignaciones = $entityManager->createQueryBuilder()
->select('asg.consecutivo_cupostickets, asg.fechaasignacion','asg.cupostotal','asg.cuposdisponibles')  // select * 
->from('CuposTickets', 'asg') // from Usuarios u 
->getQuery()
->getArrayResult();

if ($asignaciones === null) {
	echo "No hay tipo becas.\n";
	exit(1);
}

echo json_encode($asignaciones);