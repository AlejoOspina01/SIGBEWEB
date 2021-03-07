<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$useriden = $_GET['iduser'];
$tipoticket = $_GET['tipoticket'];

$periodoencontrado = $entityManager->createQuery('SELECT pa FROM Periodosacademicos pa WHERE pa.fecha_fin = (SELECT MAX(p.fecha_fin) from Periodosacademicos p)')
->getSingleResult();

$convocatoriasEncontradas=null;

if($tipoticket == 1){
	$convocatoriasEncontradas = $entityManager->createQuery('SELECT c FROM Convocatorias c WHERE c.periodosacademicos = ?1 AND c.becas = 1')
	->setParameter(1, $periodoencontrado->getConsecutivo_periodo())
	->getSingleResult();
}else{
	$convocatoriasEncontradas = $entityManager->createQuery('SELECT c FROM Convocatorias c WHERE c.periodosacademicos = ?1 AND c.becas = 2')
	->setParameter(1, $periodoencontrado->getConsecutivo_periodo())
	->getSingleResult();
}

$postulacionesEncontradas = $entityManager->createQuery('SELECT p FROM Postulacion p WHERE p.convocatoria = ?1 AND p.usuario = ?2 AND p.estado_postulacion = ?3')
->setParameter(1, $convocatoriasEncontradas->getConsecutivoConvocatoria())
->setParameter(2, $useriden)
->setParameter(3, 'Aprobado')
->getSingleResult();

$postulacionfound =  array(
	'consecutivo_postulacion'     => $postulacionesEncontradas->getConsecutivo_postulacion(),
	'fecha'         => $postulacionesEncontradas->getFechapostulacion(),
	'estrato'    => $postulacionesEncontradas->getEstrato(),
);



echo json_encode($postulacionfound);