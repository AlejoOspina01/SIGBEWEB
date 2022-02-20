<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$fechaactual = date("Y-m-d");
$fechamenosundia = date("Y-m-d", strtotime("-1 days"));
$fechamenosdosdia = date("Y-m-d", strtotime("-2 days"));
$fechamenostresdia = date("Y-m-d", strtotime("-3 days"));
$fechamenoscuatrodia = date("Y-m-d", strtotime("-4 days"));
$fechamenoscincodia = date("Y-m-d", strtotime("-5 days"));
$fechamenosseisdia = date("Y-m-d", strtotime("-6 days"));

$tickets1 =$entityManager->createQuery('SELECT SUM(u.valor) from Tickets u WHERE u.fechacompra BETWEEN ?1 AND ?2')
->setParameter(1,$fechaactual . " 00:00:00")
->setParameter(2,$fechaactual . " 23:59:59")
->getSingleResult();

$tickets2 =$entityManager->createQuery('SELECT SUM(u.valor) from Tickets u WHERE u.fechacompra BETWEEN ?1 AND ?2')
->setParameter(1,$fechamenosundia . " 00:00:00")
->setParameter(2,$fechamenosundia . " 23:59:59")
->getSingleResult();

$tickets3 =$entityManager->createQuery('SELECT SUM(u.valor) from Tickets u WHERE u.fechacompra BETWEEN ?1 AND ?2')
->setParameter(1,$fechamenosdosdia . " 00:00:00")
->setParameter(2,$fechamenosdosdia . " 23:59:59")
->getSingleResult();

$tickets4 =$entityManager->createQuery('SELECT SUM(u.valor) from Tickets u WHERE u.fechacompra BETWEEN ?1 AND ?2')
->setParameter(1,$fechamenostresdia . " 00:00:00")
->setParameter(2,$fechamenostresdia . " 23:59:59")
->getSingleResult();

$tickets5 =$entityManager->createQuery('SELECT SUM(u.valor) from Tickets u WHERE u.fechacompra BETWEEN ?1 AND ?2')
->setParameter(1,$fechamenoscuatrodia . " 00:00:00")
->setParameter(2,$fechamenoscuatrodia . " 23:59:59")
->getSingleResult();

$tickets6 =$entityManager->createQuery('SELECT SUM(u.valor) from Tickets u WHERE u.fechacompra BETWEEN ?1 AND ?2')
->setParameter(1,$fechamenoscincodia . " 00:00:00")
->setParameter(2,$fechamenoscincodia . " 23:59:59")
->getSingleResult();

$tickets7 =$entityManager->createQuery('SELECT SUM(u.valor) from Tickets u WHERE u.fechacompra BETWEEN ?1 AND ?2')
->setParameter(1,$fechamenosseisdia . " 00:00:00")
->setParameter(2,$fechamenosseisdia . " 23:59:59")
->getSingleResult();

$userarray[] =  array(
	'diaactual'     => $fechaactual . "|" . $tickets1[1],
	'diamenosuno' => $fechamenosundia. "|" .$tickets2[1],
	'diamenosdos' => $fechamenosdosdia . "|" .$tickets3[1],
	'diamenostres' => $fechamenostresdia. "|" .$tickets4[1],
	'diamenoscuatro' => $fechamenoscuatrodia. "|" .$tickets5[1],
	'diamenoscinco' => $fechamenoscincodia. "|" .$tickets6[1],
	'diamenosseis' => $fechamenosseisdia . "|" .$tickets7[1]
);

echo json_encode($userarray);