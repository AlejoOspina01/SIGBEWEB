<?php
// rol.php <name>
require_once "../../../bootstrap.php";

$newId = $_GET["id"];
$newName = $_GET["nombre"];
$newApellido = $_GET["apellido"];
$newEmail = $_GET["email"];
$newCodigo = $_GET["codigo"];
$newContrasena = $_GET["contrasena"];
$saldo=$_GET["saldo"];
$rol=$_GET["rol"];
$roluser = $entityManager->find('Roles', $rol);
if($roluser === null){
    $roluser = $entityManager->find('Roles', 1);
}
$usuario = new Usuarios();
$usuario->setIdentifacion($newId);
$usuario->setNombre($newName);
$usuario->setApellido($newApellido);
$usuario->setCodigoEst($newCodigo);
$usuario->setCorreo($newEmail);
$usuario->setContrasena($newContrasena);
$usuario->setSaldo($saldo);
//$usuario->setRol($roldeuser);
$usuario->setIdRol($roluser);


$entityManager->persist($usuario);
$entityManager->flush();

echo "Created Rol with ID " . $usuario->getNombre() . "\n";