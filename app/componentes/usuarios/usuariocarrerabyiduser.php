<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$iduser = $_GET['iduser'];
$idcarr = $_GET['idcarr'];

$carreras = $entityManager->createQuery('SELECT u FROM UsuariosCarreras u WHERE u.usuario = ?1 AND u.carrera = ?2')
->setParameter(1, $iduser)
->setParameter(2, $idcarr)
->getSingleResult();

$carrerasarray =  array(
  'carrera'     => $carreras->getCarrera()->getNombrecarrera(),
  'identi'         => $carreras->getUsuario()->getIdentifacion(),
);


echo json_encode($carrerasarray);
