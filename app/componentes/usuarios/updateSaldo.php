<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// show_roles.php <id>
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdSaldo = get_object_vars($request);

/*$newSaldo = $_GET["saldo"];
$newId = $_GET["id"];*/

$usuarioUpdate = $entityManager->createQueryBuilder();
$query = $usuarioUpdate->update('Usuarios', 'u') 
        ->set('u.saldo', '?1')
        ->where('u.identificacion = ?2')
        ->setParameter(1, $stdSaldo['saldo'])
        ->setParameter(2, $stdSaldo['idUser'])
        ->getQuery();
$execute = $query->execute();

if ($usuarioUpdate === null) {
    echo "No usuario found.\n";
    echo "Fallo";    
    exit(1);
}