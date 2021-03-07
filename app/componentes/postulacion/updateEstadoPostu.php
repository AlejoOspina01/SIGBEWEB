<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdConvo = get_object_vars($request);
$propiedadesPostu = get_object_vars($stdConvo['data']);


$postulacionUpdate = $entityManager->createQueryBuilder();
$query = $postulacionUpdate->update('Postulacion', 'p') 
->set('p.estado_postulacion', '?2')
->where('p.consecutivo_postulacion = ?1')
->setParameter(1,$propiedadesPostu['idpostu'] )
->setParameter(2,$propiedadesPostu['estadopostu'] )
->getQuery();
$execute = $query->execute();
if ($postulacionUpdate === null) {
	echo "No postulacion found.\n";
	echo "Fallo";    
	exit(1);
}  
