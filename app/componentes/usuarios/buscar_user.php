<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// show_roles.php <id>
require_once "../../../bootstrap.php";

$codigoestudiante = $_GET["codigoestudiante"];
$usuario = $entityManager->createQuery('select u from Usuarios u where u.codigoestudiante = ?1')
->setParameter(1, $codigoestudiante)
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
      'codigoestudiante'          => $usuario[$i]->getCodigoEst(),
      'saldo'          => $usuario[$i]->getSaldo(),
      'estadoestudiante'     => $usuario[$i]->getEstadouser(),
      'pdf' =>  base64_encode($usuario[$i]->getPdf())
    );
}

echo json_encode($userarray);