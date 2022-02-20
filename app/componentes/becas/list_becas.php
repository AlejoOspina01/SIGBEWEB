<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
date_default_timezone_set("America/Bogota");
error_reporting(E_ALL);
ini_set("display_errors", 1); 
require_once "../../../bootstrap.php";

$becas = $entityManager->createQueryBuilder()
->select('b')  // select * 
->from('Becas', 'b') // from becas u 
->getQuery()
->getArrayResult();

if ($becas === null) {
	echo "No hay becas found.\n";
	exit(1);
}

echo json_encode($becas);