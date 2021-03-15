<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$identi = $_GET["identificacion"];
$carrerasfound = $entityManager->createQuery('SELECT u FROM UsuariosCarreras u WHERE u.usuario = ?1')
->setParameter(1, $identi)
->getResult();


$carrerasarray;
for ($i=0; $i < sizeof($carrerasfound); $i++) { 
  $carrerasarray[$i] =  array(
    'carrera'     => $carrerasfound[$i]->getCarrera()->getNombrecarrera(),
    'codigoestudiante'         => $carrerasfound[$i]->getCodigoEstudiante()
  );
}
echo json_encode($carrerasarray);