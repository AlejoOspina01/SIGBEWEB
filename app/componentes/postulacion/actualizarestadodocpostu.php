<?php
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: PUT');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdConvo = get_object_vars($request);
$propiedadesPostu = get_object_vars($stdConvo['data']);

$newArray = array();
$arraypush = array();

foreach ($propiedadesPostu as &$arraypush) {

	if($arraypush == "//undefined"){
    	array_push($newArray, "");
    }else{
    	array_push($newArray, $arraypush);
    }
}

$postulacionUpdate = $entityManager->createQueryBuilder();
$query = $postulacionUpdate->update('Postulacion', 'p') 
->set('p.d10', '?2')
->set('p.factservicio', '?3')
->set('p.cartapeticion', '?4')
->set('p.carnetestudiante', '?5')
->set('p.cedulapadre', '?6')
->set('p.cedulamadre', '?7')
->set('p.promedioacumulado', '?8')
->set('p.tabulado', '?9')
->set('p.constanciaweb', '?10')
->set('p.certificadovencidad', '?11')
->set('p.documentoestudiante', '?12')
->set('p.documentoacudiente', '?13')
->set('p.formatosolicitudbeneficio', '?14')
->set('p.diagnosticomedico', '?15')
->set('p.recibopagomatricula', '?16')
->set('p.certificadoingresos', '?17')
->set('p.comentpsicologa', '?18')
->where('p.consecutivo_postulacion = ?1')
->setParameter(1,$newArray[0] )
->setParameter(2,$newArray[1] )
->setParameter(3,$newArray[2] )
->setParameter(4,$newArray[3] )
->setParameter(5,$newArray[4] )
->setParameter(6,$newArray[5] )
->setParameter(7,$newArray[6] )
->setParameter(8,$newArray[7] )
->setParameter(9,$newArray[8] )
->setParameter(10,$newArray[9] )
->setParameter(11,$newArray[10] )
->setParameter(12,$newArray[11] )
->setParameter(13,$newArray[12] )
->setParameter(14,$newArray[13] )
->setParameter(15,$newArray[14] )
->setParameter(16,$newArray[15] )
->setParameter(17,$newArray[16] )
->setParameter(18,$newArray[17] )
->getQuery();
$execute = $query->execute();