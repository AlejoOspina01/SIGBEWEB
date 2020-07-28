<?php
// rol.php <name>
require_once "../../../bootstrap.php";
/* include_once"../../../src/Periodos_academicos.php"; */

$newFechaInicio = $_GET["fechainicio"];
$newFechaFin = $_GET["fechafin"];
$estadoconvocatoria = $_GET["estadoconvocatoria"];

$newBeca = $_GET["beca"];

$encontrarBeca = $entityManager->find('Becas', $newBeca);
if($encontrarBeca === null){
    $encontrarBeca = $entityManager->find('Becas', 1);
}
$newPeriodo = $_GET["periodo"];

$encontrarPeriodo = $entityManager->find('Periodosacademicos', $newPeriodo);
if($encontrarPeriodo === null){
    $encontrarPeriodo = $entityManager->find('Periodosacademicos', 1);
}

$convocatorias = new Convocatorias();
$convocatorias->setEstadoConvocatoria($estadoconvocatoria);
$convocatorias->setConsecutivoBeca($encontrarBeca);
$convocatorias->setConsecutivoPeriodo($encontrarPeriodo);
$convocatorias->setFechaInicio( new \DateTime('now'));
$convocatorias->setFechaFin( new \DateTime('now'));


$entityManager->persist($convocatorias);
$entityManager->flush();

echo "Created convocatorias with ID " .  $convocatorias->getConsecutivoConvocatoria() . "\n";