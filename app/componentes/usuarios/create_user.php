<?php
// rol.php <name>
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
//agarra lo del post
$postdata = file_get_contents("php://input");
//agarra el json y lo convierte en objeto

$request = json_decode($postdata);
//Aggarra y lo vuelve arreglo
$stdPropUser = get_object_vars($request);
//saca el arreglo de adentro del arreglo


$propiedadesUser = get_object_vars($stdPropUser['data']);



$saldo=0;
$roluser = $entityManager->find('Roles', $propiedadesUser['roles']);
if($roluser === null){
	$roluser = $entityManager->find('Roles', 1);
}
$usuario = new Usuarios();
$usuario->setIdentifacion($propiedadesUser['identificacion']);
$usuario->setNombre($propiedadesUser['nombre']);
$usuario->setApellido($propiedadesUser['apellido']);	
$usuario->setCorreo($propiedadesUser['correo']);
$usuario->setContrasena($propiedadesUser['contrasena']);
$usuario->setZonaresidencial($propiedadesUser['zonaresidencial']);
$usuario->setCiudad($propiedadesUser['ciudad']);
$usuario->setFechanacimiento($propiedadesUser['fechanacimiento']);
$usuario->setEstrato($propiedadesUser['estrato']);
$usuario->setPdf($propiedadesUser['pdf']);
$usuario->setSaldo($saldo);
$usuario->setIdRol($roluser);
$usuario->setEstadouser($propiedadesUser['estadouser']);


$entityManager->persist($usuario);
$entityManager->flush();