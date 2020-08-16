<?php
// rol.php <name>
header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
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
$rol=1;
$roluser = $entityManager->find('Roles', $rol);
if($roluser === null){
    $roluser = $entityManager->find('Roles', 1);
}
$usuario = new Usuarios();
$usuario->setIdentifacion($propiedadesUser['identificacion']);
$usuario->setNombre($propiedadesUser['nombre']);
$usuario->setApellido($propiedadesUser['apellido']);
$usuario->setCodigoEst($propiedadesUser['codigoestudiante']);
$usuario->setCorreo($propiedadesUser['correo']);
$usuario->setContrasena($propiedadesUser['contrasena']);
$usuario->setSaldo($saldo);
//$usuario->setRol($roldeuser);
$usuario->setIdRol($roluser);


$entityManager->persist($usuario);
$entityManager->flush();



header('Content-Type: application/json');