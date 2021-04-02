<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";


$encuestas =$entityManager->createQuery('select u from Encuesta u')
->getResult();


for($i=0; $i< sizeof($encuestas); $i++){
    $arrayencuestas[] =  array(
     'idencuesta' =>  $encuestas[$i]->getIdEncuesta(),
     'frecuencia' => $encuestas[$i]->getFrecuencia(),
     'calidad' => $encuestas[$i]->getCalidad(),
     'calidadcomentario' => $encuestas[$i]->getCalidadComentario(),
     'cantidad' => $encuestas[$i]->getCantidad(),
     'variedad' => $encuestas[$i]->getVariedad(),
     'horario' => $encuestas[$i]->getHorario(),
     'horariocomentario' => $encuestas[$i]->getHorarioComentario(),
     'espacio' => $encuestas[$i]->getEspacio(),
     'espaciocomentario' => $encuestas[$i]->getEspacioComentario(),
     'calificacionservicio' => $encuestas[$i]->getCalificacion(),
     'calificacionserviciocomentario' => $encuestas[$i]->getCalificacionComentario(),
     'comentario' => $encuestas[$i]->getComentario(),
     'idperiodo' => $encuestas[$i]->getPeriodo()->getConsecutivo_periodo(),
     'descripcionperiodo' => $encuestas[$i]->getPeriodo()->getDescripcion()
   );
}
echo json_encode($arrayencuestas);