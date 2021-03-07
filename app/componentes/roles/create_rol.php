<?php

header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";


$newRolName = $_GET["nombre"];

$roles = new Roles();
$roles->setdescripcion($newRolName);

$entityManager->persist($roles);
$entityManager->flush();