<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdSaldoUpdate = get_object_vars($request);
$propiedadesSaldoUpdate = get_object_vars($stdSaldoUpdate['data']);

/*$newSaldo = $_GET["saldo"];
$newId = $_GET["codigoestudiante"];*/

$usuarioUpdate = $entityManager->createQueryBuilder();

$query = $usuarioUpdate->update('Usuarios', 'u') 
->set('u.saldo', '?1')
->where('u.codigoestudiante = ?2')
->setParameter(1, $propiedadesSaldoUpdate['saldo'] )
->setParameter(2, $propiedadesSaldoUpdate['codigoestudiante'])
->getQuery();        
$execute = $query->execute();

if ($usuarioUpdate === null) {
	echo "No usuario found.\n";
	echo "Fallo";    
	exit(1);
}