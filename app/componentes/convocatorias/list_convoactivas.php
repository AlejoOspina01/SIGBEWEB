<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
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
		
		'd10' =>$convocator[$i]->getD10(),
		'factservicio' =>$convocator[$i]->getFactservicio(),
		'cartapeticion' =>$convocator[$i]->getCartapeticion(),
		'carnetestudiante' =>$convocator[$i]->getCarnetestudiante(),
		'cedulapadre' =>$convocator[$i]->getCedulaPadre(),
		'cedulamadre' =>$convocator[$i]->getCedulamadre(),
		'promedioacumulado' =>$convocator[$i]->getPromedioacumulado(),
		'tabulado' =>$convocator[$i]->getTabulado(),
		'constanciaweb' =>$convocator[$i]->getConstanciaweb(),
		'certificadovencidad' =>$convocator[$i]->getCertificadovencindad(),
		'documentoestudiante' =>$convocator[$i]->getDocumentoidentidad(),
		'documentoacudiente' =>$convocator[$i]->getDocumentoAcudiente(),
		'formatosolicitudbeneficio' =>$convocator[$i]->getFormatosolicitud(),
		'diagnosticomedico' =>$convocator[$i]->getDiagnostico(),
		'recibopagomatricula' =>$convocator[$i]->getRecibomatricula(),
		'certificadoingresos' =>$convocator[$i]->getCertificadoIngresos());
}


if ($convocator === null) {
	echo "No convomipana found.\n";
	exit(1);
}

echo json_encode($convosActivas);