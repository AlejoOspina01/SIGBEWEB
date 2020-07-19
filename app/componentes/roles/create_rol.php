<?php
// rol.php <name>
require_once "../../../bootstrap.php";


$newRolName = $_GET["nombre"];

$roles = new Roles();
$roles->setdescripcion($newRolName);

$entityManager->persist($roles);
$entityManager->flush();

echo "Created Rol with ID " . $roles->getIdRol() . "\n";
