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

$variablesActualizar;
if(sizeof($propiedadesPostu['listEstadosDocs']) != 0)  {
	for ($i=0; $i < sizeof($propiedadesPostu['listEstadosDocs']); $i++) { 

		$archivoseparacion = explode("|-|",$propiedadesPostu['listEstadosDocs'][$i]);
		$documentoPostupdate = $entityManager->createQueryBuilder();
		$query = $documentoPostupdate->update('DocumentoPostulacion', 'dp') 
		->set('dp.archivodocumento', '?1')
		->set('dp.estado', '?4')
		->where('dp.documento = ?2')
		->andWhere('dp.postulacion = ?3')
		->setParameter(1,$archivoseparacion[1] )
		->setParameter(2,$archivoseparacion[0] )
		->setParameter(4,0 )
		->setParameter(3,$propiedadesPostu['idpost'] )
		->getQuery();
		$execute = $query->execute();
	}
}
