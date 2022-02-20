<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
//agarra lo del post
$postdata = file_get_contents("php://input");
//agarra el json y lo convierte en objeto

$request = json_decode($postdata);
//Aggarra y lo vuelve arreglo
$stdPorpdepartamentos = get_object_vars($request);
//saca el arreglo de adentro del arreglo
$propiedasdepar = get_object_vars($stdPorpdepartamentos['data']);


$idepartamento= $propiedasdepar['iddepartamento'];
$ciudades = $entityManager->createQuery('select c from ciudad c where c.departamento = ?1')
    ->setParameter(1,$idepartamento);
    


$resultado= $ciudades->getResult();
$ciudadesarray;

for($i=0; $i< sizeof($resultado); $i++){
   $ciudadesarray[$i]= array(
         
         'nombre'  => $resultado[$i]->getNombre(),
         'idciudad' => $resultado[$i]->getIdCiudad());   

} 

 echo json_encode($ciudadesarray);

