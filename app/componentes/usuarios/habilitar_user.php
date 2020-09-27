<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// show_roles.php <id>
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdEstu = get_object_vars($request);
$propiedadesEstu = get_object_vars($stdEstu['data']);


$estudianteUpdate = $entityManager->createQueryBuilder();
$query = $estudianteUpdate->update('Usuarios', 'u') 
        ->set('u.estadouser', '?2')
        ->where('u.codigoestudiante = ?1')
        ->setParameter(1,$propiedadesEstu['codigoestudiante'])
        ->setParameter(2,$propiedadesEstu['estadouser'])
        ->getQuery();
        $execute = $query->execute();
if ($estudianteUpdate === null) {
    echo "No postulacion found.\n";
    echo "Fallo";    
    exit(1);
}  
