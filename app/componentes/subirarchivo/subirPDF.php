<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: PUT');
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
    $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
    
    $params = json_decode($json); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
    
    $nombre = $params->nombre;
    $nombreArchivo = $params->nombreArchivo;
    $archivo = $params->base64textString;
    $archivo = base64_decode($archivo);
    
   /* $filePath = $_SERVER['DOCUMENT_ROOT']."/sigbeweb/".$nombreArchivo;
   file_put_contents($filePath, $archivo);*/

   $usuarioUpdate = $entityManager->createQueryBuilder();

   $query = $usuarioUpdate->update('Usuarios', 'u') 
   ->set('u.pdf', '?1')
   ->where('u.codigoestudiante = ?2')
   ->setParameter(1, $archivo )
   ->setParameter(2, 1234 )
   ->getQuery();        
   $execute = $query->execute();
   
   if ($usuarioUpdate === null) {
    echo "No usuario found.\n";
    echo "Fallo";    
    exit(1);
}




    // $sql = "INSERT INTO documentos (pdf) VALUES($archivo)";
    // class Result {}
    // // GENERA LOS DATOS DE RESPUESTA
    // $response = new Result();

    // $response->resultado = 'OK';
    // $response->mensaje = 'SE SUBIO EXITOSAMENTE';

header('Content-Type: application/json');

?>