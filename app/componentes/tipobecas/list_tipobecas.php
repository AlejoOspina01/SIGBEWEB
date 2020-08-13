<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


 
require_once "../../../bootstrap.php";

$tipobeca = $entityManager->createQueryBuilder()
->select('tb')  // select * 
->from('TipoBecas', 'tb') // from Usuarios u 
->getQuery()
->getArrayResult();

if ($tipobeca === null) {
    echo "No hay tipo becas.\n";
    exit(1);
}

echo json_encode($tipobeca);
header('Content-Type: application/json');