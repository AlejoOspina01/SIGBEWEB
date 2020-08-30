<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// show_roles.php <id>
require_once "../../../bootstrap.php";

$usuario = $entityManager->createQueryBuilder()
->select('u')  // select * 
->from('Usuarios', 'u') // from Usuarios u 
->getQuery()
->getArrayResult();

if ($usuario === null) {
    echo "No usuario found.\n";
    exit(1);
}

echo json_encode($usuario);