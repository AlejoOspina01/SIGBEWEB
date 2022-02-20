<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$idperiodo=$_GET["idperiodo"];

  $periodoencontrado = $entityManager->createQuery('SELECT pa FROM Periodosacademicos pa WHERE pa.consecutivo_periodo = ?1 ')
  ->setParameter(1,$idperiodo)
  ->getSingleResult();

$tickets =$entityManager->createQuery('SELECT u FROM Tickets u')
->getResult();

$fechainiperiodosel = strtotime($periodoencontrado->getFechaInicio()->format("Y-m-d h:i"));
$fechafinperiodosel = strtotime($periodoencontrado->getFechaFin()->format("Y-m-d h:i"));
$fechaticketsel;

for($i=0; $i< sizeof($tickets); $i++){
  $fechaticketsel = strtotime($tickets[$i]->getFechaCompra()->format("Y-m-d h:i"));
  if(($fechaticketsel >= $fechainiperiodosel) && ($fechaticketsel <= $fechafinperiodosel)){
     $arraytickets[] =  array(
       'consecutivoticket' =>  $tickets[$i]->getConsecutivoTicket(),
       'fecha_compra' => $tickets[$i]-> getFechaCompra()->format("Y-m-d h:i"), 
       'identificacion_estudiante' => $tickets[$i]->getUsuario()->getIdentifacion(),
       'valorticket' =>$tickets[$i]->getValor(),
       'nombre_estudiate' =>  $tickets[$i]->getUsuario()->getNombre(),
       'apellido_estudiate' =>  $tickets[$i]->getUsuario()->getApellido(),
       'tipoticket' =>  $tickets[$i]->getTipoTicket(),
       'estadoticket' => $tickets[$i]->getEstado()
     );
  }

}
echo json_encode($arraytickets);