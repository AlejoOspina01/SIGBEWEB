<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$idConvo = $_GET["idconvo"];
$convobuscada = $entityManager->createQuery('select c from Convocatorias c where c.consecutivo_convocatoria = ?1')
->setParameter(1, $idConvo)
->getSingleResult();

if ($convobuscada === null) {
  echo "No usuario found.\n";
  exit(1);
}

$convoarray =  array(
  'consecutivo_convocatoria'      => $convobuscada->getConsecutivoConvocatoria(),
  'fechainicio'     => $convobuscada->getFechaInicio()->format('Y-m-d H:i'),
  'fechafin'         => $convobuscada->getFechaFin()->format('Y-m-d H:i'),
  'estadoconvo'      => $convobuscada->getEstadoConvocatoria(),
  'cupo'         => $convobuscada->getCupo(),
  'beca'          => $convobuscada->getConsecutivoBeca()->getConsecutivo_beca(),
  'descbeca'      => $convobuscada->getConsecutivoBeca()->getDescripcion(),
      //'periodo'     =>  array('fechaInicioperiodo' => $convobuscada->getConsecutivoPeriodo()->getFechaInicio()->format('Y-m-d H:i'),
  'periodosacademicos'     =>  $convobuscada->getConsecutivoPeriodo()->getConsecutivo_periodo(),
  'descperiodo' =>  $convobuscada->getConsecutivoPeriodo()->getDescripcion()
        //'fechaFinperiodo' => $convobuscada->getConsecutivoPeriodo()->getFechaFin()->format('Y-m-d H:i')
);


echo json_encode($convoarray);