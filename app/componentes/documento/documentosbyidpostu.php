<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";

$idPostu = $_GET['idpostu'];
$documentospostulacion = $entityManager->createQuery("SELECT dp FROM DocumentoPostulacion dp WHERE dp.postulacion = ?1");
$documentospostulacion->setParameter(1,$idPostu);
$Queryresult = $documentospostulacion->getResult();

$postByIdConvo;

for ($i=0; $i < sizeof($Queryresult); $i++) { 
	$arrayByIdConvo[$i] =  array(
		'concecutivodoc'     => $Queryresult[$i]->getDocumento()->getIdDocumento(),
		'nombredoc' => $Queryresult[$i]->getDocumento()->getDescripcion(),
		'archivo'         => $Queryresult[$i]->getArchivo(),
		'estado'  => $Queryresult[$i]->getEstado()
	);
}

echo json_encode($arrayByIdConvo);