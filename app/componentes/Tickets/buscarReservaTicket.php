<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
error_reporting(E_ALL);
ini_set("display_errors", 1);

$codigoticket = $_GET['codigoesc'];
$valticket = false;
try {
	$ticketencontrado = $entityManager->createQuery('SELECT tk FROM Tickets tk WHERE tk.consecutivoticket = ?1')
	->setParameter(1, $codigoticket)
	->getSingleResult();
	$valticket = true;
} catch (Exception $e) {
	throw new Exception('No tiene tickets');
}
if($valticket){
	$periodoencontrado = $entityManager->createQuery('SELECT pa FROM Periodosacademicos pa WHERE pa.fecha_fin = (SELECT MAX(p.fecha_fin) from Periodosacademicos p)')
	->getSingleResult();

	$convocatoriasEncontradas=null;


	if($ticketencontrado->getTipoTicket() == 'Ticket Refrigerio'){
try {
		$convocatoriasEncontradas = $entityManager->createQuery('SELECT c FROM Convocatorias c WHERE c.periodosacademicos = ?1 AND c.becas = 2')//
	->setParameter(1, $periodoencontrado->getConsecutivo_periodo())
	->getSingleResult();
} catch (Doctrine\ORM\NoResultException $e) {
		$postulacionfound =  array(
		'tipoTicket'     => $ticketencontrado->getTipoTicket(),
		'fechaticket'         => $ticketencontrado->getFechaCompra()->format("Y-m-d h:i"),
		'nombreest' =>  $ticketencontrado->getUsuario()->getNombre(),
		'beneficiario' => 0

	);
	echo json_encode($postulacionfound);
	return;
}


}else{
	try {
			$convocatoriasEncontradas = $entityManager->createQuery('SELECT c FROM Convocatorias c WHERE c.periodosacademicos = ?1 AND c.becas = 1')
	->setParameter(1, $periodoencontrado->getConsecutivo_periodo())
	->getSingleResult();
	} catch (Doctrine\ORM\NoResultException $e) {
		$postulacionfound =  array(
		'tipoTicket'     => $ticketencontrado->getTipoTicket(),
		'fechaticket'         => $ticketencontrado->getFechaCompra()->format("Y-m-d h:i"),
		'nombreest' =>  $ticketencontrado->getUsuario()->getNombre(),
		'beneficiario' => 0

	);
	echo json_encode($postulacionfound);
	return;
	}

}

try {
	$postulacionesEncontradas = $entityManager->createQuery('SELECT p FROM Postulacion p WHERE p.convocatoria = ?1 AND p.usuario = ?2 AND p.estado_postulacion = ?3')
	->setParameter(1, $convocatoriasEncontradas->getConsecutivoConvocatoria())
	->setParameter(2, $ticketencontrado->getUsuario()->getIdentifacion())
	->setParameter(3, 'Aprobado')
	->getSingleResult();
	$postulacionfound =  array(
		'tipoTicket'     => $ticketencontrado->getTipoTicket(),
		'fechaticket'         => $ticketencontrado->getFechaCompra()->format("Y-m-d h:i"),
		'consecutivo_postulacion'     => $postulacionesEncontradas->getConsecutivo_postulacion(),
		'fecha'         => $postulacionesEncontradas->getFechapostulacion()->format("Y-m-d h:i"),
		'estrato'    => $postulacionesEncontradas->getEstrato(),
		'nombreest' =>  $ticketencontrado->getUsuario()->getNombre(),
		'beneficiario' => 1

	);
	echo json_encode($postulacionfound);
} catch (Doctrine\ORM\NoResultException $e) {
	$postulacionfound =  array(
		'tipoTicket'     => $ticketencontrado->getTipoTicket(),
		'fechaticket'         => $ticketencontrado->getFechaCompra()->format("Y-m-d h:i"),
		'nombreest' =>  $ticketencontrado->getUsuario()->getNombre(),
		'beneficiario' => 0

	);
	echo json_encode($postulacionfound);
}

}