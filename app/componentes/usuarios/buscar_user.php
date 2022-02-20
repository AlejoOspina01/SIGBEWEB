<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$identificacion = $_GET["identificacion"];
$usuario = $entityManager->createQuery('select u from Usuarios u where u.identificacion = ?1')
->setParameter(1, $identificacion)
->getResult();

if ($usuario === null) {
  echo "No usuario found.\n";
  exit(1);
}
for($i=0; $i< sizeof($usuario); $i++){
  
 $userarray[] =  array(
  'identificacion'     => $usuario[$i]->getIdentifacion(),
  'nombre'         => $usuario[$i]->getNombre(),
  'apellido'      => $usuario[$i]->getApellido(),
  'correo'         => $usuario[$i]->getCorreo(),
  'saldo'          => $usuario[$i]->getSaldo(),
  'estadoestudiante'     => $usuario[$i]->getEstadouser(),
  'pdf' =>  base64_encode($usuario[$i]->getPdf())
);
}

echo json_encode($userarray);