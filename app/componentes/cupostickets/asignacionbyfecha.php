<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// show_roles.php <id>
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
	'cupostotal'      => $cupoasignacion->getCuposTotales(),
	'cuposdisponibles'         => $cupoasignacion->getCuposDisponibles()
);

echo json_encode($cupoticketfound);