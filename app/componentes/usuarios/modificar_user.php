<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdSaldo = get_object_vars($request);
$propiedadesSaldo = get_object_vars($stdSaldo['data']);

/*$newSaldo = $_GET["saldo"];
$newId = $_GET["id"];*/

$usuarioUpdate = $entityManager->createQueryBuilder();
$query = $usuarioUpdate->update('Usuarios', 'u') 
->set('u.correo', '?3')
->set('u.nombre', '?5')
->set('u.apellido', '?6')
->where('u.identificacion = ?2')
->setParameter(2, $propiedadesSaldo['identificacion'])
->setParameter(3, $propiedadesSaldo['correo'])
->setParameter(5, $propiedadesSaldo['nombre'])
->setParameter(6, $propiedadesSaldo['apellido'])
->getQuery();
$execute = $query->execute();

if ($usuarioUpdate === null) {
	echo "No usuario found.\n";
	echo "Fallo";    
	exit(1);
}