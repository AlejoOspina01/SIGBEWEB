<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$idest = $_GET['idest'];
$postulaciones = $entityManager->createQuery("SELECT p FROM Postulacion p, UsuariosCarreras uc, Usuarios u WHERE uc.idusuariocarrera=p.usuariocarrera AND uc.usuario=?1");
//("SELECT p FROM Postulacion p, Usuarios u, UsuariosCarreras uc 
//WHERE p.usuariocarrera=uc.idusuariocarrera AND uc.usuario = u.identificacion AND p.usuario = ?1");
$postulaciones->setParameter(1,$idest);
$Postulacionesresult = $postulaciones->getResult();

$postByIdEst;

for ($i=0; $i < sizeof($Postulacionesresult); $i++) { 
	try{
		$beneficiarioFound = $entityManager->createQuery('SELECT u FROM Beneficiarios u WHERE u.postulacion = ?1')
		->setParameter(1, $Postulacionesresult[$i]->getConsecutivo_postulacion())
		->getSingleResult();		
		$postByIdEst[$i] =  array(
			'consecutivo_postulacion'     => $Postulacionesresult[$i]->getConsecutivo_postulacion(),
			'nombreConv'         => $Postulacionesresult[$i]-> getConvocatoria()->getConsecutivoBeca()->getDescripcion(),
			'fechapostulacion' => $Postulacionesresult[$i]->getFechapostulacion()->format('Y-m-d H:i'),
			'semestre' =>$Postulacionesresult[$i]->getSemestre(),
			'promedio' =>$Postulacionesresult[$i]->getPromedio(),
			'estadopromedio' =>$Postulacionesresult[$i]->getEstadoPromedio(),
			'estrato' =>$Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getEstrato() ,
			'estado_postulacion' =>$Postulacionesresult[$i]->getEstado_postulacion() , 
			'estudiante' => array('nombreestudiante' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getNombre() . " " . $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getApellido() ,
				'identificacion' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getIdentifacion() ,
				'correoest' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getCorreo()));
	}catch(Doctrine\ORM\NoResultException $ex){
		$postByIdEst[$i] =  array(
			'consecutivo_postulacion'     => $Postulacionesresult[$i]->getConsecutivo_postulacion(),
			'nombreConv'         => $Postulacionesresult[$i]-> getConvocatoria()->getConsecutivoBeca()->getDescripcion(),	
			'fechapostulacion' => $Postulacionesresult[$i]->getFechapostulacion()->format('Y-m-d H:i'),
			'semestre' =>$Postulacionesresult[$i]->getSemestre(),
			'promedio' =>$Postulacionesresult[$i]->getPromedio(),
			'estadopromedio' =>$Postulacionesresult[$i]->getEstadoPromedio(),
			'estrato' =>$Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getEstrato() ,
			'estado_postulacion' =>$Postulacionesresult[$i]->getEstado_postulacion() , 
			'estudiante' => array('nombreestudiante' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getNombre() . " " . $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getApellido() ,
				'identificacion' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getIdentifacion() ,
				'correoest' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getCorreo()));
	}

}

if ($postulaciones === null) {
	echo "No convomipana found.\n";
	exit(1);
}

echo json_encode($postByIdEst);