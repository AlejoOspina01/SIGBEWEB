<?php
// rol.php <name>
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once "../../../bootstrap.php";

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdTBeca = get_object_vars($request);
$propiedadesTBeca = get_object_vars($stdTBeca['data']);

$tipoBecas = new TipoBecas();
$tipoBecas->setDescripcion($propiedadesTBeca['descripcion']);

$entityManager->persist($tipoBecas);
$entityManager->flush();