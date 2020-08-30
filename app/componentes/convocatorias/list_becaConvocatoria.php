<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
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