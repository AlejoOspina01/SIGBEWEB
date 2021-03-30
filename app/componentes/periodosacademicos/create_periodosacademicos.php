<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
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
$periodosacademicos->setEstadoPeriodo(true);


$entityManager->persist($periodosacademicos);
$entityManager->flush();

$usuariosest =$entityManager->createQuery('SELECT u FROM Usuarios u WHERE u.roles = 1')
->getResult();

echo json_encode($usuariosest);

for ($i=0; $i < sizeof($usuariosest); $i++) { 
	$usuarioUpdate = $entityManager->createQueryBuilder();
	$query = $usuarioUpdate->update('Usuarios', 'u') 
	->set('u.estadoactualizadodatos', '?3')
	->where('u.identificacion = ?2')
	->setParameter(2, $usuariosest[$i]->getIdentifacion())
	->setParameter(3, 0)
	->getQuery();
	$execute = $query->execute();
}


