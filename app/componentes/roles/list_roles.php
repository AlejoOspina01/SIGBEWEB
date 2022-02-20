<?php
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";


$rolRepository = $entityManager->getRepository('Roles')
->createQueryBuilder('c')
->select('c')
->getQuery()
->getArrayResult();

echo json_encode($rolRepository);

// foreach ($roles as $rol) {
//     echo json_encode($rol);
// }