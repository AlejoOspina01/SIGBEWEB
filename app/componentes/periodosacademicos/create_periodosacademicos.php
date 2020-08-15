<?php
// rol.php <name>
require_once "../../../bootstrap.php";

$newFechaInicio = $_GET["fechainicio"];
$newFechaFin = $_GET["fechafin"];
$periodosacademicos = new Periodosacademicos();
$periodosacademicos->setFechaInicio( new \DateTime('now'));
$periodosacademicos->setFechaFin( new \DateTime('now'));


$entityManager->persist($periodosacademicos);
$entityManager->flush();

echo "Created Periodoacademico with ID " .  $periodosacademicos->getConsecutivo_periodo() . "\n";
