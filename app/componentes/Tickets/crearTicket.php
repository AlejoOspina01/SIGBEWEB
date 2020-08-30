<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once "../../../bootstrap.php";


$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


$stdPropTickets = get_object_vars($request);
$propiedadesTickets = get_object_vars($stdPropTickets['data']);

$encontrarUsr = $entityManager->find('Usuarios',$propiedadesTickets['idUser']);

$tickets = new Tickets();
$tickets->setFechaCompra(new \DateTime( 'now',  new DateTimeZone( 'America/Bogota' ) ));
$tickets->setValor($propiedadesTickets['valorticket'] );
$tickets->setTipoTicket($propiedadesTickets['tipoTicket']);
$tickets->setEstado('Sin usar');
$tickets->setUsuario($encontrarUsr);


$entityManager->persist($tickets);
$entityManager->flush();
