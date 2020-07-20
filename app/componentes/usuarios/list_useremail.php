<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// show_roles.php <id>
require_once "../../../bootstrap.php";

$email = $_GET["email"];
$usuario = $entityManager->createQueryBuilder()
->select('u')
->from('Usuarios', 'u')
->where('u.correo = ' . "'$email'")
->getQuery()
->getArrayResult();

if ($usuario === null) {
    echo "No usuario found.\n";
    exit(1);
}

echo json_encode($usuario);
header('Content-Type: application/json');