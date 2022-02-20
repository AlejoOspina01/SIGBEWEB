<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
// encuesta.php <name>
require_once "../../../bootstrap.php";

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdEncuesta = get_object_vars($request);
$propiedadesEncuesta = get_object_vars($stdEncuesta['data']);

$encontrarUsuario = $entityManager->find('Usuarios',$propiedadesEncuesta['iduser']);
$encontrarPeriodo = $entityManager->find('Periodosacademicos',$propiedadesEncuesta['idperiodo']);

$encuesta = new Encuesta;
$encuesta->setPeriodo($encontrarPeriodo);
$encuesta->setUsuario($encontrarUsuario);

$encuesta->setFrecuencia($propiedadesEncuesta['frecuencia']);
$encuesta->setCalidad($propiedadesEncuesta['calidad']);
$encuesta->setCantidad($propiedadesEncuesta['cantidad']);
$encuesta->setVariedad($propiedadesEncuesta['variedad']);
$encuesta->setEspacio($propiedadesEncuesta['espacio']);
$encuesta->setHorario($propiedadesEncuesta['horario']);
$encuesta->setCalificacion($propiedadesEncuesta['calificacion']);

$encuesta->setCalidadComentario($propiedadesEncuesta['calidadcomentario']);
$encuesta->setEspacioComentario($propiedadesEncuesta['espaciocomentario']);
$encuesta->setHorarioComentario($propiedadesEncuesta['horariocomentario']);
$encuesta->setCalificacionComentario($propiedadesEncuesta['calificacioncomentario']);

$encuesta->setComentario($propiedadesEncuesta['comentario']);

$entityManager->persist($encuesta);
$entityManager->flush();