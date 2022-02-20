<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";

$idConvo = $_GET['idconvo'];
$postulaciones = $entityManager->createQuery("SELECT p FROM Postulacion p , UsuariosCarreras uc, Carreras c, Usuarios u where p.usuariocarrera=uc.idusuariocarrera AND uc.usuario = u.identificacion AND uc.carrera=c.codigocarrera AND p.convocatoria = ?1");

$postulaciones->setParameter(1,$idConvo);
$Postulacionesresult = $postulaciones->getResult();

$postByIdConvo;









for ($i=0; $i < sizeof($Postulacionesresult); $i++) { 
	try {
		$beneficiarioFound = $entityManager->createQuery('SELECT u FROM Beneficiarios u WHERE u.postulacion = ?1')
		->setParameter(1, $Postulacionesresult[$i]->getConsecutivo_postulacion())
		->getSingleResult();
	$postByIdConvo[$i] =  array(
		'consecutivo_postulacion'     => $Postulacionesresult[$i]->getConsecutivo_postulacion(),
		'estadopromedio' => $Postulacionesresult[$i]->getEstadoPromedio(),
		'promedio'         => $Postulacionesresult[$i]->getPromedio(),
		'ciudadresidencia' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getCiudad()->getNombre(),
		'direccionresidencia' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getDireccion(),
		'fechapostulacion' => $Postulacionesresult[$i]->getFechapostulacion()->format('Y-m-d'),
		'fecharevision' => $Postulacionesresult[$i]->getFechaRevisión(),
		'fechabeneficio' => $beneficiarioFound->getFechaBeneficiario(),
		'imagencocina' => $Postulacionesresult[$i]->getImagenCocina(),
		'imagencuarto' => $Postulacionesresult[$i]->getImagenCuarto(),
		'tiemporestantebene' => $beneficiarioFound-> getTiempoBeneficiarioRestante(),
		'tiempototalbene' => $beneficiarioFound->getTiempoBeneficiario(),
		'observacionbene' => $beneficiarioFound->getObservacion(),
		'semestre' =>$Postulacionesresult[$i]->getSemestre(),
		'coments' =>$Postulacionesresult[$i]->getComentPsicologa(),
		'estrato' =>$Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getEstrato(),
		'codigoestudiante' =>$Postulacionesresult[$i]->getUsuarioCarrera()->getCodigoEstudiante(),
		'carrera' =>$Postulacionesresult[$i]->getUsuarioCarrera()->getCarrera()->getNombrecarrera(),
		'estado_postulacion' =>$Postulacionesresult[$i]->getEstado_postulacion() , 
		'estudiante' => array('nombreestudiante' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getNombre() . " " . $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getApellido() , 
							  'identificacion' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getIdentifacion()));
	} catch (Doctrine\ORM\NoResultException $ex) {
			$postByIdConvo[$i] =  array(
		'consecutivo_postulacion'     => $Postulacionesresult[$i]->getConsecutivo_postulacion(),
		'estadopromedio' => $Postulacionesresult[$i]->getEstadoPromedio(),
		'promedio'         => $Postulacionesresult[$i]->getPromedio(),
		'ciudadresidencia' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getCiudad()->getNombre(),
		'direccionresidencia' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getDireccion(),
		'fechapostulacion' => $Postulacionesresult[$i]->getFechapostulacion()->format('Y-m-d'),
		'imagencocina' => $Postulacionesresult[$i]->getImagenCocina(),
		'imagencuarto' => $Postulacionesresult[$i]->getImagenCuarto(),		
		'tiemporestantebene' => null,
		'tiempototalbene' => null,
		'observacionbene' => null,	
		'fechabeneficio' => null,			
		'fecharevision' => $Postulacionesresult[$i]->getFechaRevisión(),
		'semestre' =>$Postulacionesresult[$i]->getSemestre(),
		'coments' =>$Postulacionesresult[$i]->getComentPsicologa(),
		'estrato' =>$Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getEstrato(),
		'codigoestudiante' =>$Postulacionesresult[$i]->getUsuarioCarrera()->getCodigoEstudiante(),
		'carrera' =>$Postulacionesresult[$i]->getUsuarioCarrera()->getCarrera()->getNombrecarrera(),
		'estado_postulacion' =>$Postulacionesresult[$i]->getEstado_postulacion() , 
		'estudiante' => array('nombreestudiante' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getNombre() . " " . $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getApellido() , 
							  'identificacion' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getIdentifacion()));
	}
}

echo json_encode($postByIdConvo);







