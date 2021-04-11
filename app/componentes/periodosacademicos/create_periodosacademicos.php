<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

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

try{
$beneficiariosactualizar =$entityManager->createQuery('SELECT u FROM Beneficiarios u, Postulacion p WHERE u.postulacion = p.consecutivo_postulacion AND p.estado_postulacion = ?1 AND u.tiempobeneficiariorestante > 0')
->setParameter(1,'Aprobado')
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

for ($i=0; $i < sizeof($beneficiariosactualizar); $i++) { 
	$beneficiarioUpdate = $entityManager->createQueryBuilder();
	$query = $beneficiarioUpdate->update('Beneficiarios', 'u') 
	->set('u.tiempobeneficiariorestante', '?1')
	->where('u.postulacion = ?2')
	->andWhere('u.convocatoria = ?3')
	->setParameter(1, $beneficiariosactualizar[$i]->getTiempoBeneficiarioRestante() - 1 )
	->setParameter(2, $beneficiariosactualizar[$i]->getPostulacion()->getConsecutivo_postulacion())
	->setParameter(3,$beneficiariosactualizar[$i]->getConvocatoria()->getConsecutivoConvocatoria())
	->getQuery();
	$execute = $query->execute();
}


}catch(Doctrine\ORM\NoResultException $ex){
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
}





