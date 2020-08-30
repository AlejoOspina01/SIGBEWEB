<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// show_roles.php <id>
require_once "../../../bootstrap.php";

$id = $argv[1];
$rol = $entityManager->find('Roles', $id);

if ($rol === null) {
    echo "No rol found.\n";
    exit(1);
}
