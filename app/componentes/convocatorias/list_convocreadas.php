<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

require_once "../../../bootstrap.php";
/* include_once"../../../src/Periodos_academicos.php"; */
$idperiodo = $_GET["idperiodo"];
$idbeca = $_GET["idbeca"];
$convocatorias = $entityManager->createQuery('
	select c from Convocatorias c  where c.periodosacademicos=?1 and c.becas=?2')
->setParameter(1,$idperiodo)
->setParameter(2,$idbeca)
->getSingleResult();

$convoarray =  array(
    'consecutivo_convocatoria'     => $convocatorias->getConsecutivoConvocatoria(),
    'beca'         => $convocatorias->getConsecutivoBeca()->getConsecutivo_beca(),
    'periodosacademicos'      => $convocatorias->getConsecutivoPeriodo()->getConsecutivo_periodo(),
    'fecha_inicio'         => $convocatorias->getFechaInicio(),
    'fecha_fin'     => $convocatorias->getFechaFin(),
    'estado_convocatoria'     => $convocatorias->getEstadoConvocatoria(),
    'cupo'     => $convocatorias->getCupo()
  );
  if ($convocatorias === null) {
    echo "No convomipana found.\n";
    exit(1);
  }
  
  echo json_encode($convoarray);
