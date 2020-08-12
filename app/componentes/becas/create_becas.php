<?php
// rol.php <name>
require_once "../../../bootstrap.php";


$newDescripcionBeca = $_GET["descripcion"];
$newTipoBeca = $_GET["tipobeca"];
$EncontrarTipoBeca = $entityManager->find('TipoBecas', $newTipoBeca);
if($EncontrarTipoBeca === null){
    $EncontrarTipoBeca = $entityManager->find('TipoBecas', 1);
}
$becas = new Becas;
$becas->setDescripcion($newDescripcionBeca);
$becas->setTipoBeca($EncontrarTipoBeca);
$entityManager->persist($becas);
$entityManager->flush();

echo "Created Beca with ID " .  $becas->getConsecutivo_beca() . "\n";