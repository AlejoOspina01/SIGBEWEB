<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// rol.php <name>
require_once "../../../bootstrap.php";


$newRolName = $_GET["nombre"];

$roles = new Roles();
$roles->setdescripcion($newRolName);

$entityManager->persist($roles);
$entityManager->flush();
