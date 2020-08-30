<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once "../../../bootstrap.php";

$convocatorias = $entityManager->createQuery("
    SELECT u
    FROM Convocatorias u WHERE u.estado_convocatoria = 'Activo'");

$convocator = $convocatorias->getResult();

$convosActivas;


// echo ($convocator[0]->getConsecutivoBeca()->getDescripcion());

for ($i=0; $i < sizeof($convocator); $i++) { 
	$convosActivas[$i] =  array(
	   'consecutivoconvo'     => $convocator[$i]->getConsecutivoConvocatoria(),
       'beca'         => $convocator[$i]->getConsecutivoBeca()->getDescripcion());
}
 

if ($convocator === null) {
    echo "No convomipana found.\n";
    exit(1);
}

echo json_encode($convosActivas);