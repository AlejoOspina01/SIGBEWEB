<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
date_default_timezone_set("America/Bogota");
error_reporting(E_ALL);
ini_set("display_errors", 1);
// rol.php <name>
require_once "../../../bootstrap.php";


/*$newDescripcionBeca = $_GET["descripcion"];
$newTipoBeca = $_GET["tipobeca"];*/
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdBeca = get_object_vars($request);
$propiedadesBeca = get_object_vars($stdBeca['data']);
$encontrarTipoBeca = $entityManager->find('TipoBecas',$propiedadesBeca['tipobeca']);

/*$EncontrarTipoBeca = $entityManager->find('TipoBecas', $newTipoBeca);
if($EncontrarTipoBeca === null){
    $EncontrarTipoBeca = $entityManager->find('TipoBecas', 1);
}*/

$becas = new Becas;
$becas->setDescripcion($propiedadesBeca['descripcion']);
$becas->setTipoBeca($encontrarTipoBeca);
$entityManager->persist($becas);
$entityManager->flush();