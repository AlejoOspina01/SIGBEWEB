<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
date_default_timezone_set("America/Bogota");
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";
$convocatorias = $entityManager->createQueryBuilder()
->select('b.consecutivo_beca,b.descripcion')  
->from('Becas', 'b') 
->getQuery()
->getArrayResult();

if ($convocatorias === null) {
	echo "No convomipana found.\n";
	exit(1);
}

echo json_encode($convocatorias);