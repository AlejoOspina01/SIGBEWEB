<?php
// rol.php <name>
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
date_default_timezone_set("America/Bogota");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdTBeca = get_object_vars($request);
$propiedadesAnuncio = get_object_vars($stdTBeca['data']);

$fechaactual = date('Y-m-d');
$fecha = new DateTime($fechaactual );

$anuncio = new Anuncios();
$anuncio->setImg($propiedadesAnuncio['img']);
$anuncio->setLink($propiedadesAnuncio['link']);
$anuncio->setFechapublicacion($fecha);

$entityManager->persist($anuncio);
$entityManager->flush();