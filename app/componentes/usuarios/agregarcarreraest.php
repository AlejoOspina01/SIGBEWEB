<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";


$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


$stdPropTickets = get_object_vars($request);
$propiedadesTickets = get_object_vars($stdPropTickets['data']);

$encontrarUsr = $entityManager->find('Usuarios',$propiedadesTickets['idUser']);
$encontrarCarr = $entityManager->find('Carreras',$propiedadesTickets['idCarr']);

$usuarioCarrera = new UsuariosCarreras();
$usuarioCarrera->setUsuario($encontrarUsr);
$usuarioCarrera->setCarrera($encontrarCarr);
$usuarioCarrera->setCodigoEstudiante($propiedadesTickets['codigoest']);


$entityManager->persist($usuarioCarrera);
$entityManager->flush();

$resultadosuccess = array( "resultado" => "Creado exitosamente" );
echo json_encode($resultadosuccess);
