<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// show_roles.php <id>
require_once "../../../bootstrap.php";

$idUser = $_GET["idUser"];

$fechahoy = new \DateTime('now');
$fechafinal= $fechahoy->format('Y-m-d H:i:s');

$ticketencontrado = $entityManager->createQuery('select u from Tickets u where u.fechacompra >= ?1 or u.fechacompra <= ?1')
->setParameter(1, $fechafinal)
->getSingleResult();

if ($ticketencontrado === null) {
	echo "No asignacion found.\n";
	exit(1);
}

$ticketfound =  array(
	'concecutivo'     => $ticketencontrado->getConsecutivoTicket(),
	'fecha'         => $ticketencontrado->getFechaCompra(),
);

echo json_encode($ticketfound);