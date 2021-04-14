<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";


$postdata = file_get_contents("php://input");
$request = json_decode($postdata);



$stdPropTickets = get_object_vars($request);
// $propiedadesTickets = get_object_vars($stdPropTickets['data']);


$fechaactual = date("Y-m-d");

$encontrarUsr = $entityManager->find('Usuarios',$stdPropTickets['idUser']);
// $encontrarAsign = $entityManager->find('CuposTickets',$propiedadesTickets['idAsign']);

$cupoasignacion = $entityManager->createQuery('select u from CuposTickets u where u.fechaasignacion = ?1')
->setParameter(1, $fechaactual)
->getSingleResult();

$tickets = new Tickets();
$tickets->setFechaCompra(new \DateTime( 'now',  new DateTimeZone( 'America/Bogota' ) ));
$tickets->setValor($stdPropTickets['valorticket'] );
$tickets->setTipoTicket($stdPropTickets['tipoTicket']);
$tickets->setEstado('Sin usar');
$tickets->setUsuario($encontrarUsr);
$tickets->setCupostickets($cupoasignacion);


$entityManager->persist($tickets);
$entityManager->flush();

$resultadosuccess = array( "resultado" => "Creado exitosamente" );
echo json_encode($resultadosuccess);
