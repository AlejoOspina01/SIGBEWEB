<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";

$idConvo = $_GET['idconvo'];
$documentosconvocatorias = $entityManager->createQuery("SELECT dc FROM DocumentoConvocatoria dc WHERE dc.convocatoria = ?1");
$documentosconvocatorias->setParameter(1,$idConvo);
$Queryresult = $documentosconvocatorias->getResult();

$postByIdConvo;

for ($i=0; $i < sizeof($Queryresult); $i++) { 
	$arrayByIdConvo[$i] =  array(
		'concecutivodoc'     => $Queryresult[$i]->getDocumento()->getIdDocumento(),
		'nombredoc' => $Queryresult[$i]->getDocumento()->getDescripcion(),
		'concecutivoconvo'         => $Queryresult[$i]->getConvocatoria()->getConsecutivoConvocatoria()
	);
}

echo json_encode($arrayByIdConvo);