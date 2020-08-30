<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// rol.php <name>
require_once "../../../bootstrap.php";


$newDescripcionTipoBeca = $_GET["descripcion"];

$tipoBecas = new TipoBecas();
$tipoBecas->setDescripcion($newDescripcionTipoBeca);

$entityManager->persist($tipoBecas);
$entityManager->flush();