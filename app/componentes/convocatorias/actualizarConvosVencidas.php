<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";

$fechaactual = date('Y-m-d H:i');

$convobuscada = $entityManager->createQuery('SELECT c.consecutivo_convocatoria, c.estado_convocatoria FROM Convocatorias c WHERE c.fecha_fin < ?1 AND c.estado_convocatoria = ?2')
->setParameter(1, $fechaactual)
->setParameter(2, 'Activo')
->getResult();


if(sizeof($convobuscada) != 0){
	for ($i=0; $i < sizeof($convobuscada); $i++) { 
		$convocatoriaUpdate = $entityManager->createQueryBuilder();
		$query = $convocatoriaUpdate->update('Convocatorias', 'c') 
		->set('c.estado_convocatoria', '?1')
		->where('c.consecutivo_convocatoria = ?2')
		->setParameter(1,'Inactivo' )
		->setParameter(2,$convobuscada[$i]['consecutivo_convocatoria'] )
		->getQuery();
		$execute = $query->execute();
	}
}
echo json_encode($convobuscada);



