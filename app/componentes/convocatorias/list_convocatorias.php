<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once "../../../bootstrap.php";
/* include_once"../../../src/Periodos_academicos.php"; */

$convocatorias = $entityManager->createQuery('
	select u from Convocatorias u  where u = u');

$convocator=$convocatorias->getResult();

$convos;

for ($i=0; $i < sizeof($convocator); $i++) { 
	$convos[$i] =  array(
	   'consecutivo_convocatoria'  => $convocator[$i]->getConsecutivoConvocatoria(),
       'beca'  => $convocator[$i]->getConsecutivoBeca()->getDescripcion(),
       'periodosacademicos' => $convocator[$i]->getConsecutivoPeriodo()->getDescripcion(),
        'fecha_inicio'=>$convocator[$i]->getFechaInicio(),
	   'fecha_fin' =>$convocator[$i]->getFechaFin(),
        'estado_convocatoria'=> $convocator[$i]->getEstadoConvocatoria(),
        'cupo'=> $convocator[$i]-> getCupo());
}
if ($convocatorias === null) {
    echo "No convomipana found.\n";
    exit(1);
}

echo json_encode($convos);