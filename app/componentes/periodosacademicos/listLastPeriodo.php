<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$periodoencontrado = $entityManager->createQuery('SELECT u FROM Periodosacademicos u WHERE u.fecha_fin = (SELECT MAX(p.fecha_fin) from Periodosacademicos p)')
->getSingleResult();

if ($periodoencontrado === null) {
	echo "No asignacion found.\n";
	exit(1);
}

$periodofound =  array(
	'consecutivo_periodo'     => $periodoencontrado->getConsecutivo_periodo(),
	'descripcion'         => $periodoencontrado->getDescripcion(),
	'fechainicial'    => $periodoencontrado->getFechaInicio(),
	'fechafinal'    => $periodoencontrado->getFechaFin()
);

echo json_encode($periodofound);