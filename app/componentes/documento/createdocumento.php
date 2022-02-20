<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";


$postdata = file_get_contents("php://input");

$documento = new Documentos();
$documento->setDescripcion( $postdata);


$entityManager->persist($documento);
$entityManager->flush();
