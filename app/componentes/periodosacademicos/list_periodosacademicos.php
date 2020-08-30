<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");



require_once "../../../bootstrap.php";

$periodo = $entityManager->createQueryBuilder()
->select('pa.consecutivo_periodo, pa.descripcion')  
->from('periodosacademicos', 'pa') 
->getQuery()
->getArrayResult();

if ($periodo === null) {
    echo "No found.\n";
    exit(1);
}

echo json_encode($periodo);
header('Content-Type: application/json'); 