<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once "../../../bootstrap.php";
/* include_once"../../../src/Periodos_academicos.php"; */

$carreras = $entityManager->createQuery('
	SELECT u FROM Carreras u  WHERE u = u');

$convocator=$carreras->getResult();

$convos;

for ($i=0; $i < sizeof($convocator); $i++) { 
	$convos[$i] =  array(
    'idcarrera'  => $convocator[$i]->getConsecutivoCarrera(),
    'carreranombre'  => $convocator[$i]->getNombrecarrera()
    
  );
}
echo json_encode($convos);