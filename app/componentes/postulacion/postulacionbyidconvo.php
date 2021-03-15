<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$idConvo = $_GET["idconvo"];
$postubuscada = $entityManager->createQuery('SELECT p FROM Postulacion p WHERE p.convocatoria = ?1')
->setParameter(1, $idConvo)
->getSingleResult();


$postuarray =  array(
  'consecutivopostu'      => $postubuscada->getConsecutivo_postulacion(),
  'carrera' => $postubuscada->getUsuarioCarrera()->getCarrera()->getNombrecarrera()
        //'fechaFinperiodo' => $convobuscada->getConsecutivoPeriodo()->getFechaFin()->format('Y-m-d H:i')
);


echo json_encode($postuarray);