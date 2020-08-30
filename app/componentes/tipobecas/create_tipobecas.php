<?php
// rol.php <name>
require_once "../../../bootstrap.php";


$newDescripcionTipoBeca = $_GET["descripcion"];

$tipoBecas = new TipoBecas();
$tipoBecas->setDescripcion($newDescripcionTipoBeca);

$entityManager->persist($tipoBecas);
$entityManager->flush();