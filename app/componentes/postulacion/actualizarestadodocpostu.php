<?php
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: PUT');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdConvo = get_object_vars($request);
$propiedadesPostu = get_object_vars($stdConvo['data']);

$postulacionUpdate = $entityManager->createQueryBuilder();
$query = $postulacionUpdate->update('Postulacion', 'p') 
->set('p.comentpsicologa', '?2')
->where('p.consecutivo_postulacion = ?1')
->setParameter(1,$propiedadesPostu['idpost'] )
->setParameter(2,$propiedadesPostu['observacion'] )
->getQuery();
$execute = $query->execute();


$variablesActualizar;
if(sizeof($propiedadesPostu['listEstadosDocs']) != 0)  {
	for ($i=0; $i < sizeof($propiedadesPostu['listEstadosDocs']); $i++) { 
		$variablesActualizar = get_object_vars($propiedadesPostu['listEstadosDocs'][$i]);
		$documentoPostupdate = $entityManager->createQueryBuilder();
		$query = $documentoPostupdate->update('DocumentoPostulacion', 'dp') 
		->set('dp.estado', '?1')
		->where('dp.documento = ?2')
		->andWhere('dp.postulacion = ?3')
		->setParameter(1,$variablesActualizar['estadonuevo'] )
		->setParameter(2,$variablesActualizar['concecutivodoc'] )
		->setParameter(3,$propiedadesPostu['idpost'] )
		->getQuery();
		$execute = $query->execute();
	}
}
