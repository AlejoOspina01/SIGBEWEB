<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdConvo = get_object_vars($request);
$propiedadesConvo = get_object_vars($stdConvo['data']);

$becaConvo = get_object_vars($propiedadesConvo['becas']);
$periodoConvo = get_object_vars($propiedadesConvo['periodosacademicos']);

$convocatoriaUpdate = $entityManager->createQueryBuilder();
$query = $convocatoriaUpdate->update('Convocatorias', 'c') 
->set('c.cupo', '?1')
->set('c.becas', '?3')
->set('c.periodosacademicos', '?4')
->set('c.fecha_inicio', '?5')
->set('c.fecha_fin', '?6')
->set('c.estado_convocatoria', '?7')
->where('c.consecutivo_convocatoria = ?2')
->setParameter(1,$propiedadesConvo['cupo'] )
->setParameter(3,$becaConvo['consecutivo_beca'] )
->setParameter(4,$periodoConvo['consecutivo_periodo'] )
->setParameter(5,$propiedadesConvo['fecha_inicio'] )
->setParameter(6,$propiedadesConvo['fecha_fin'] )
->setParameter(7,$propiedadesConvo['estado_convocatoria'] )
->setParameter(2,$propiedadesConvo['consecutivo_convocatoria'] )
->getQuery();
$execute = $query->execute();