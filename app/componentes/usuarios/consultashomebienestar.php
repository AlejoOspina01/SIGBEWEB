<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";
$usrnumber = 0;
$ticknumber = 0;
$postnumber = 0;
$convnumber = 0;
$usuario = $entityManager->createQuery('SELECT COUNT(u) FROM Usuarios u ')
->getSingleResult();

$tickets = $entityManager->createQuery('SELECT COUNT(u) FROM Tickets u ')
->getSingleResult();
$postulaciones = $entityManager->createQuery('SELECT COUNT(u) FROM Postulacion u ')
->getSingleResult();
$convocatorias = $entityManager->createQuery('SELECT COUNT(u) FROM Convocatorias u ')
->getSingleResult();

if ($postulaciones === null) {
	echo "No usuario found.\n";
	exit(1);
}

$userarray[] =  array(
	'numerouser'     => $usuario[1],
	'numerotickets' => $tickets[1],
	'numeropostu' => $postulaciones[1],
	'numeroconvo' => $convocatorias[1]
);


echo json_encode($userarray);

