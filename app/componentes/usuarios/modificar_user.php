<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdSaldo = get_object_vars($request);
$propiedadesSaldo = get_object_vars($stdSaldo['data']);

/*$newSaldo = $_GET["saldo"];
$newId = $_GET["id"];*/
//$fechainicio = (new \DateTime('now', new DateTimeZone('America/Bogota')))->format('Y-m-d H:i:s');
//var_dump($propiedadesSaldo);
$usuarioUpdate = $entityManager->createQueryBuilder();
$query = $usuarioUpdate->update('Usuarios', 'u') 
->set('u.correo', '?3')
->set('u.nombre', '?5')
->set('u.apellido', '?6')
->set('u.contrasena','?7')
->set('u.zonaresidencial','?8')
->set('u.direcciondomicilio','?9')
->set('u.fechanacimiento','?10')
->set('u.estrato','?11')
->where('u.identificacion = ?2')
->setParameter(2, $propiedadesSaldo['identificacion'])
->setParameter(3, $propiedadesSaldo['correo'])
->setParameter(5, $propiedadesSaldo['nombre'])
->setParameter(6, $propiedadesSaldo['apellido'])
->setParameter(7, $propiedadesSaldo['contrasena'])
->setParameter(8, $propiedadesSaldo['zonaresidencial'])
->setParameter(9, $propiedadesSaldo['direccion'])
->setParameter(10, $propiedadesSaldo['fechanacimiento'])
->setParameter(11, $propiedadesSaldo['estrato'])
->getQuery();
$execute = $query->execute();

if ($usuarioUpdate === null) {
	echo "No usuario found.\n";
	echo "Fallo";    
	exit(1);
}