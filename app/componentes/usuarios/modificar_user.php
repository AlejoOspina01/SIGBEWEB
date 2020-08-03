<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// show_roles.php <id>
require_once "../../../bootstrap.php";
$newName = $_GET["nombre"];
$newId = $_GET["id"];

$usuarioUpdate = $entityManager->createQueryBuilder();
$query = $usuarioUpdate->update('usuarios', 'u') 
        ->set('u.nombre', '?1')
        ->where('u.identificacion = ?2')
        ->setParameter(1, $newName)
        ->setParameter(2, $newId)
        ->getQuery();
$execute = $query->execute();

if ($usuarioUpdate === null) {
    echo "No usuario found.\n";
    echo "Fallo";    
    exit(1);
}
echo "Actualizo";    
echo json_encode($usuarioUpdate);
header('Content-Type: application/json');