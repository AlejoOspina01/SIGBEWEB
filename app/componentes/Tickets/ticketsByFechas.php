<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$fechaini=$_GET["fechaini"];
$fechafin=$_GET["fechafin"];

$fechaini = $fechaini . ' 00:00:00';
$fechafin = $fechafin . ' 23:00:00';


$tickets =$entityManager->createQuery('SELECT u FROM Tickets u WHERE u.fechacompra BETWEEN ?1 AND ?2')
->setParameter(1, $fechaini)
->setParameter(2, $fechafin)
->getResult();

for($i=0; $i< sizeof($tickets); $i++){
  $arraytickets[] =  array(
   'consecutivoticket' =>  $tickets[$i]->getConsecutivoTicket(),
   'fecha_compra' => $tickets[$i]-> getFechaCompra()->format("Y-m-d h:i"), 
   'identificacion_estudiante' => $tickets[$i]->getUsuario()->getIdentifacion(),
   // 'codigo_estudiante' =>$tickets[$i]->getUsuario()->getCodigoEst(),
   'nombre_estudiate' =>  $tickets[$i]->getUsuario()->getNombre(),
   'apellido_estudiate' =>  $tickets[$i]->getUsuario()->getApellido(),
   'valorticket' =>$tickets[$i]->getValor(),
   'tipoticket' =>  $tickets[$i]->getTipoTicket(),
   'estadoticket' => $tickets[$i]->getEstado()
 );
}
echo json_encode($arraytickets);