<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$stdUser = get_object_vars($request);
$properties = get_object_vars($stdUser['data']);

$postuFound = $entityManager->createQuery('SELECT u FROM Postulacion u WHERE u.consecutivo_postulacion = ?1')
->setParameter(1, $properties['idpostu'])
->getSingleResult();

$postulacionUpdate = $entityManager->createQueryBuilder();
$query = $postulacionUpdate->update('Postulacion', 'p') 
->set('p.imagencocina', '?2')
->set('p.imagencuarto', '?3')
->where('p.consecutivo_postulacion = ?1')
->setParameter(1,$properties['idpostu'] )
->setParameter(2,$properties['imagencocina'] )
->setParameter(3,$properties['imagencuarto'] )
->getQuery();
$execute = $query->execute();