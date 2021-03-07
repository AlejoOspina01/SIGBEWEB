<?php
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$id = $argv[1];
$rol = $entityManager->find('Roles', $id);

if ($rol === null) {
	echo "No rol found.\n";
	exit(1);
}