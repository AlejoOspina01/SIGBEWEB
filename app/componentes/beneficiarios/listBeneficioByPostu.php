<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
date_default_timezone_set("America/Bogota");
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";

$idpostu = $_GET["idpostu"];
$idconvo = $_GET["idconvo"];
$benefound = $entityManager->createQuery('SELECT u FROM Beneficiarios u WHERE u.postulacion = ?1 AND u.convocatoria = ?2')
->setParameter(1, $idconvo)
->getResult();


$carrerasarray;
for ($i=0; $i < sizeof($benefound); $i++) { 
  	$carrerasarray[$i] =  array(
		'tiempobeneficiario' => $benefound[$i]->getTiempoBeneficiario(),
		'tiempobeneficiariorestante' => $benefound[$i]->getTiempoBeneficiarioRestante(),
		'Observacion' => $benefound[$i]->getObservacion(),
	);
}
echo json_encode($carrerasarray);