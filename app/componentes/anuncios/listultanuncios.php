<?php

use Doctrine\ORM\Mapping\OrderBy;

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
date_default_timezone_set("America/Bogota");
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";

$periodo = $entityManager->createQueryBuilder()
->select('pa')  
->from('Anuncios', 'pa') 
->OrderBy('pa.codigoanuncio', 'DESC')
->setMaxResults(3)
->getQuery()
->getArrayResult();

if ($periodo === null) {
	echo "No found.\n";
	exit(1);
}

echo json_encode($periodo);