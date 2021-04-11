<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";


$periodos =$entityManager->createQuery('select u from Periodosacademicos u')
->getResult();


for($i=0; $i< sizeof($periodos); $i++){
    $arraytickets[] =  array(
     'consecutivo_periodo' =>  $periodos[$i]->getConsecutivo_periodo(),
     'descripcion' => $periodos[$i]->getDescripcion()
   );
}
echo json_encode($arraytickets);