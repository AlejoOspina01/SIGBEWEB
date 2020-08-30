<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// rol.php <name>
require_once "../../../bootstrap.php";


$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


$stdPropPeriodo = get_object_vars($request);
$propiedadesPeriodo = get_object_vars($stdPropPeriodo['data']);

$convertfechainicial = date('Y-m-d', strtotime(str_replace('-','/', $propiedadesPeriodo['fechainicial'])));
$convertfechafin = date('Y-m-d', strtotime(str_replace('-','/', $propiedadesPeriodo['fechafin'])));
$fechainicial = new \DateTime($convertfechainicial);;
$fechafin = new \DateTime($convertfechafin);;

$periodosacademicos = new Periodosacademicos();
$periodosacademicos ->setDescripcion($propiedadesPeriodo['descripcion']);
$periodosacademicos->setFechaInicio( $fechainicial);
$periodosacademicos->setFechaFin( $fechafin);


$entityManager->persist($periodosacademicos);
$entityManager->flush();
