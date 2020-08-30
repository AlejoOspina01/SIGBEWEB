<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// rol.php <name>
require_once "../../../bootstrap.php";


$newDescripcionBeca = $_GET["descripcion"];
$newTipoBeca = $_GET["tipobeca"];
$EncontrarTipoBeca = $entityManager->find('TipoBecas', $newTipoBeca);
if($EncontrarTipoBeca === null){
    $EncontrarTipoBeca = $entityManager->find('TipoBecas', 1);
}
$becas = new Becas;
$becas->setDescripcion($newDescripcionBeca);
$becas->setTipoBeca($EncontrarTipoBeca);
$entityManager->persist($becas);
$entityManager->flush();
