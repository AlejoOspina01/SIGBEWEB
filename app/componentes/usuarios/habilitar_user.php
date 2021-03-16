<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdEstu = get_object_vars($request);
$propiedadesEstu = get_object_vars($stdEstu['data']);


$estudianteUpdate = $entityManager->createQueryBuilder();
$query = $estudianteUpdate->update('Usuarios', 'u') 
->set('u.estadouser', '?2')
->where('u.identificacion = ?1')
->setParameter(1,$propiedadesEstu['identificacion'])
->setParameter(2,$propiedadesEstu['estadouser'])
->getQuery();
$execute = $query->execute();
if ($estudianteUpdate === null) {
	echo "No postulacion found.\n";
	echo "Fallo";    
	exit(1);
}  
