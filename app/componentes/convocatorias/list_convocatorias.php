<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


 
require_once "../../../bootstrap.php";
/* include_once"../../../src/Periodos_academicos.php"; */

$convocatorias = $entityManager->createQueryBuilder()
->select('u')  // select * 
->from('Convocatorias', 'u') // from Usuarios u 
->getQuery()
->getArrayResult();

if ($convocatorias === null) {
    echo "No convomipana found.\n";
    exit(1);
}

echo json_encode($convocatorias);
header('Content-Type: application/json');