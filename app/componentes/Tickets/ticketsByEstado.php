<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$estadoticket=$_GET["estado"];

$tickets =$entityManager->createQuery('SELECT u FROM Tickets u WHERE u.estadoticket = ?1')
->setParameter(1, $estadoticket)
->getResult();

if ($tickets === null) {
  echo "No usuario found.\n";
  exit(1);
}


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