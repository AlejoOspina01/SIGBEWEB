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

$stdConvo = get_object_vars($request);
$propiedadesConvo = get_object_vars($stdConvo['data']);

if($propiedadesConvo['cupos'] > 0){
	$convocatoriaUpdate = $entityManager->createQueryBuilder();
	$query = $convocatoriaUpdate->update('Convocatorias', 'c') 
	->set('c.cupo', '?2')
	->where('c.consecutivo_convocatoria = ?1')
	->setParameter(1,$propiedadesConvo['idconvo'] )
	->setParameter(2,$propiedadesConvo['cupos'] )
	->getQuery();
	$execute = $query->execute();
	if ($convocatoriaUpdate === null) {
		echo "No usuario found.\n";
		echo "Fallo";    
		exit(1);
	} 
}else{
	echo "No hay mas cupos disponibles para la convocatoria.";
}

 
