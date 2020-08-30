<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// rol.php <name>
require_once "../../../bootstrap.php";

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdConvo = get_object_vars($request);
$propiedadesConvo = get_object_vars($stdConvo['data']);

$encontrarBeca = $entityManager->find('Becas',$propiedadesConvo['becas']);
$encontrarPeriodo = $entityManager->find('Periodosacademicos',$propiedadesConvo['periodo']);

$convocatorias = new Convocatorias();
$convocatorias->setEstadoConvocatoria($propiedadesConvo['estadoconvocatoria']);
$convocatorias->setCupo($propiedadesConvo['cupo']);
$convocatorias->setConsecutivoBeca($encontrarBeca);
$convocatorias->setConsecutivoPeriodo($encontrarPeriodo);
$convocatorias->setFechaInicio( new \DateTime('now'));
$convocatorias->setFechaFin( new \DateTime('now'));


$entityManager->persist($convocatorias);
$entityManager->flush();
