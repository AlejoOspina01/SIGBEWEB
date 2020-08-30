<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// show_roles.php <id>
require_once "../../../bootstrap.php";

$email = $_GET["email"];
$usuario = $entityManager->createQuery('select u from Usuarios u where u.correo = ?1')
->setParameter(1, $email)
->getSingleResult();

if ($usuario === null) {
    echo "No usuario found.\n";
    exit(1);
}

 $userarray =  array(
      'identificacion'     => $usuario->getIdentifacion(),
      'nombre'         => $usuario->getNombre(),
      'apellido'      => $usuario->getApellido(),
      'correo'         => $usuario->getCorreo(),
      'codigoestudiante'          => $usuario->getCodigoEst(),
      'contrasena'     => $usuario->getContrasena(),
      'saldo'     => $usuario->getSaldo(),
      'roles'  => $usuario->getIdRol()->getIdRol()
    );

echo json_encode($userarray);