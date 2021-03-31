<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdCuposDisp = get_object_vars($request);
$propiedadesSaldoUpdate = get_object_vars($stdCuposDisp['data']);

/*$newSaldo = $_GET["saldo"];
$newId = $_GET["codigoestudiante"];*/
$cuposTicketsupdate = $entityManager->createQueryBuilder();

$fecha = strtotime($propiedadesSaldoUpdate['fecha']);


$newDate = date('Y-m-d',$fecha);
$query = $cuposTicketsupdate->update('CuposTickets', 'u') 
->set('u.cuposdisponiblesalmuerzo', '?1')
->set('u.cuposdisponiblesrefrigerio', '?2')
->set('u.fechaasignacion', '?4')
->where('u.consecutivo_cupostickets = ?3')
->setParameter(1, $propiedadesSaldoUpdate['cuposalmuerzo'] )
->setParameter(2, $propiedadesSaldoUpdate['cuposrefrigerio'] )
->setParameter(3, $propiedadesSaldoUpdate['conceasign'])
->setParameter(4, $newDate)
->getQuery();        
$execute = $query->execute();