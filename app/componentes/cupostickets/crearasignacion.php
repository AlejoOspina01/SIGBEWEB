<?php
// rol.php <name>
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET,PUT,POST,DELETE,OPTIONS');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once "../../../bootstrap.php";

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdAsign = get_object_vars($request);
$propiedadesAsign = get_object_vars($stdAsign['data']);

$fecha = new DateTime($propiedadesAsign['fecha']);


$cupoTicket = new CuposTickets();
$cupoTicket->setFechaAsignacion($fecha);
$cupoTicket->setCuposTotales($propiedadesAsign['cupostotal']);
$cupoTicket->setCuposDisponibles($propiedadesAsign['cupostotal']);

$entityManager->persist($cupoTicket);
$entityManager->flush();