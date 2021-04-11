<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";


$tickets =$entityManager->createQuery('select u from Tickets u')
->getResult();

if ($tickets === null) {
  echo "No usuario found.\n";
  exit(1);
}


for($i=0; $i< sizeof($tickets); $i++){
    $arraytickets[] =  array(
     'consecutivoticket' =>  $tickets[$i]->getConsecutivoTicket(),
     'fecha_compra' => $tickets[$i]-> getFechaCompra()->format("Y-m-d h:i"), 
     'tipoticket' => $tickets[$i]->getTipoTicket(),
     'identificacion_estudiante' => $tickets[$i]->getUsuario()->getIdentifacion(),
     'valorticket' =>$tickets[$i]->getValor(),
     'nombre_estudiate' =>  $tickets[$i]->getUsuario()->getNombre(),
     'apellido_estudiate' =>  $tickets[$i]->getUsuario()->getApellido(),
     'estadoticket' => $tickets[$i]->getEstado()
   );
}
echo json_encode($arraytickets);