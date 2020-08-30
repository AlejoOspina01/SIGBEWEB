<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// rol.php <name>
require_once "../../../bootstrap.php";

$newFechaInicio = $_GET["fechainicio"];
$newFechaFin = $_GET["fechafin"];
$periodosacademicos = new Periodosacademicos();
$periodosacademicos->setFechaInicio( new \DateTime('now'));
$periodosacademicos->setFechaFin( new \DateTime('now'));


$entityManager->persist($periodosacademicos);
$entityManager->flush();
