<?php
// rol.php <name>
require_once "../../../bootstrap.php";
include_once"../../../src/Periodos_academicos.php";

$newFechaInicio = $_GET["fechainicio"];
$newFechaFin = $_GET["fechafin"];
$periodosacademicos = new Periodos_academicos();
$periodosacademicos->setFechaInicio( new \DateTime('now'));
$periodosacademicos->setFechaFin( new \DateTime('$now'));


$entityManager->persist($periodosacademicos);
$entityManager->flush();

echo "Created Periodoacademico with ID " .  $periodosacademicos->getConsecutivo_periodo() . "\n";
