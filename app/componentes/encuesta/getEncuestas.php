<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";


$encuestas =$entityManager->createQuery('select u from Encuesta u')
->getResult();

function verificarFrecuencia($primera)
 {
    switch ($primera) {
        case 0:
            return "Todos los dias";
            break;
        case 1:
            return "1-3 veces a la semana";
            break;
        case 2:
            return "3-4 veces a la semana";
            break;                        
        
        default:
            # code...
            break;
    }
 }
function verificarCalidad($primera)
 {
    switch ($primera) {
        case 0:
            return "Excelente";
            break;
        case 1:
            return "Bueno";
            break;
        case 2:
            return "Regular";
            break;                        
        case 3:
            return "Malo";
            break;          
        default:
            # code...
            break;
    }
 }
function verificarCantidad($primera)
 {
        switch ($primera) {
        case 0:
            return "Si";
            break;
        case 1:
            return "No";
            break;
        case 2:
            return "A veces";
            break;                        
        
        default:
            # code...
            break;
    }
 }
function verificarVariedad($primera)
 {
        switch ($primera) {
        case 0:
            return "Si";
            break;
        case 1:
            return "No";
            break;
        case 2:
            return "A veces";
            break;                        
        
        default:
            # code...
            break;
    }
 }
function verificarHorario($primera)
 {
    switch ($primera) {
        case 0:
            return "Si";
            break;
        case 1:
            return "No";
            break;                      
        
        default:
            # code...
            break;
    }
 }
function verificarEspacio($primera)
 {
    switch ($primera) {
        case 0:
            return "Si";
            break;
        case 1:
            return "No";
            break;                      
        
        default:
            # code...
            break;
    }
 }
function verificarCalificacion($primera)
 {
    switch ($primera) {
        case 0:
            return "Excelente";
            break;
        case 1:
            return "Bueno";
            break;
        case 2:
            return "Regular";
            break;                        
        case 3:
            return "Malo";
            break;          
        default:
            # code...
            break;
    }
 }
 
for($i=0; $i< sizeof($encuestas); $i++){
    
    $arrayencuestas[] =  array(
     'idencuesta' =>  $encuestas[$i]->getIdEncuesta(),
     'frecuencia' => verificarFrecuencia($encuestas[$i]->getFrecuencia()),
     'calidad' => verificarCalidad($encuestas[$i]->getCalidad()),
     'calidadcomentario' => $encuestas[$i]->getCalidadComentario(),
     'cantidad' => verificarCantidad($encuestas[$i]->getCantidad()),
     'variedad' =>  verificarVariedad($encuestas[$i]->getVariedad()),
     'horario' => verificarHorario($encuestas[$i]->getHorario()),
     'horariocomentario' => $encuestas[$i]->getHorarioComentario(),
     'espacio' => verificarEspacio($encuestas[$i]->getEspacio()),
     'espaciocomentario' => $encuestas[$i]->getEspacioComentario(),
     'calificacionservicio' => verificarCalificacion($encuestas[$i]->getCalificacion()),
     'calificacionserviciocomentario' => $encuestas[$i]->getCalificacionComentario(),
     'comentario' => $encuestas[$i]->getComentario(),
     'idperiodo' => $encuestas[$i]->getPeriodo()->getConsecutivo_periodo(),
     'descripcionperiodo' => $encuestas[$i]->getPeriodo()->getDescripcion()
   );
}
echo json_encode($arrayencuestas);