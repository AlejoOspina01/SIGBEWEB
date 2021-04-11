<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
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
		'beca'         => $convocator[$i]->getConsecutivoBeca()->getDescripcion(),
		'fechainicio' => $convocator[$i]->getFechaInicio()->format('Y-m-d H:i'),
		'fechafin' => $convocator[$i]->getFechaFin()->format('Y-m-d H:i'),
		'cupos' => $convocator[$i]->getCupo(),
		'periodonombre' => $convocator[$i]->getConsecutivoPeriodo()->getDescripcion()
	);
}


if ($convocator === null) {
	echo "No convomipana found.\n";
	exit(1);
}

echo json_encode($convosActivas);