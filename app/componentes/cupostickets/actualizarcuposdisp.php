<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// show_roles.php <id>
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdCuposDisp = get_object_vars($request);
$propiedadesSaldoUpdate = get_object_vars($stdCuposDisp['data']);

/*$newSaldo = $_GET["saldo"];
$newId = $_GET["codigoestudiante"];*/
$cuposTicketsupdate = $entityManager->createQueryBuilder();

$query = $cuposTicketsupdate->update('CuposTickets', 'u') 
->set('u.cuposdisponiblesalmuerzo', '?1')
->set('u.cuposdisponiblesrefrigerio', '?2')
->where('u.consecutivo_cupostickets = ?3')
->setParameter(1, $propiedadesSaldoUpdate['cuposalmuerzo'] )
->setParameter(2, $propiedadesSaldoUpdate['cuposrefrigerio'] )
->setParameter(3, $propiedadesSaldoUpdate['conceasign'])
->getQuery();        
$execute = $query->execute();