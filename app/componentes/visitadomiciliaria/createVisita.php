<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdVisita = get_object_vars($request);
$propiedadesVisita = get_object_vars($stdVisita['data']);


$encontrarPostulacion = $entityManager->find('Postulacion',$propiedadesVisita['postulacionid']);

// var_dump($propiedadesVisita);

$visita = new  VisitaDomiciliaria();
//$visitaDomiciliaria->setPostulacion($encontrarPostulacion);
$visita->setPostulacion($encontrarPostulacion);
$visita->setEstamento($propiedadesVisita['estamento']);
$visita->setBarrio($propiedadesVisita['barrio']);
$visita->setComuna($propiedadesVisita['comuna']);
$visita->setParentesco($propiedadesVisita['parentesco']);
$visita->setObligacion($propiedadesVisita['obligacion']);
$visita->setCualObligacion($propiedadesVisita['cualobligacion']);
$visita->setEstratoDane($propiedadesVisita['estratodane']);
$visita->setPagoArriendo($propiedadesVisita['pagoarriendo']);
$visita->setValorArriendo($propiedadesVisita['valorarriendo']);
$visita->setCubreArriendo($propiedadesVisita['cubrearriendo']);
$visita->setOtroArriendo($propiedadesVisita['otroarriendo']);
$visita->setFuenteIngreso($propiedadesVisita['fuenteingreso']);
$visita->setCualFuente($propiedadesVisita['cualfuente']);
$visita->setTipoCasa($propiedadesVisita['tipocasa']);
$visita->setAspectoCasa($propiedadesVisita['aspectocasa']);
$visita->setCualAspecto($propiedadesVisita['cualaspecto']);
$visita->setServicioPublico($propiedadesVisita['serviciopublico']);
$visita->setCuartoSolicitante($propiedadesVisita['cuartosolicitante']);
$visita->setCantidadPersonas($propiedadesVisita['cantidadpersonas']);
$visita->setDescripcionFinal($propiedadesVisita['descripcionfinal']);
$visita->setNombreAtencion($propiedadesVisita['nombreatencion']);

$visita->setFechaRegistro(new \DateTime('now'));


$entityManager->persist($visita);
$entityManager->flush();



