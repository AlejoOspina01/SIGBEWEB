<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdSaldo = get_object_vars($request);
$propiedadesSaldo = get_object_vars($stdSaldo['data']);

$usuarioUpdate = $entityManager->createQueryBuilder();
$query = $usuarioUpdate->update('Usuarios', 'u') 
->set('u.estadoactualizadodatos', '?3')
->where('u.identificacion = ?2')
->setParameter(2, $propiedadesSaldo['identificacion'])
->setParameter(3, $propiedadesSaldo['estadodatos'])
->getQuery();
$execute = $query->execute();
