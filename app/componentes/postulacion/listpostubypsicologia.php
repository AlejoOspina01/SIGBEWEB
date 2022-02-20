<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";

$idConvo = $_GET['idconvo'];
$postulaciones = $entityManager->createQuery("SELECT p FROM Postulacion p , UsuariosCarreras uc, Carreras c, Usuarios u where p.usuariocarrera=uc.idusuariocarrera AND uc.usuario = u.identificacion AND uc.carrera=c.codigocarrera AND p.convocatoria = ?1 AND (p.estado_postulacion = ?2 OR p.estado_postulacion = ?3)");
$postulaciones->setParameter(1,$idConvo)
->setParameter(2,'Entrevista')
->setParameter(3,'Visita');
$Postulacionesresult = $postulaciones->getResult();

$postByIdConvo;
$encontroEntrevista;
$encontroVisita;

for ($i=0; $i < sizeof($Postulacionesresult); $i++) { 
	try{
		$entrevistaFound = $entityManager->createQuery('SELECT u FROM InformacionGeneral u WHERE u.idpostulaciongeneral = ?1')
		->setParameter(1, $Postulacionesresult[$i]->getConsecutivo_postulacion())
		->getSingleResult();
		$encontroEntrevista = true;
		try {
			$VisitaFound = $entityManager->createQuery('SELECT u FROM VisitaDomiciliaria u WHERE u.postulacion = ?1')
			->setParameter(1, $Postulacionesresult[$i]->getConsecutivo_postulacion())
			->getSingleResult();
			$encontroVisita = true;
		} catch (Doctrine\ORM\NoResultException $e) {
			$encontroVisita = false;
		}

	}catch(Doctrine\ORM\NoResultException $ex){
		$encontroEntrevista = false;
		try {
			$VisitaFound = $entityManager->createQuery('SELECT u FROM VisitaDomiciliaria u WHERE u.postulacion = ?1')
			->setParameter(1, $Postulacionesresult[$i]->getConsecutivo_postulacion())
			->getSingleResult();
			$encontroVisita = true;
		} catch (Doctrine\ORM\NoResultException $e) {
			$encontroVisita = false;
		}
	}

			$postByIdConvo[$i] =  array(
			'consecutivo_postulacion'     => $Postulacionesresult[$i]->getConsecutivo_postulacion(),
			'estadopromedio' => $Postulacionesresult[$i]->getEstadoPromedio(),
			'promedio'         => $Postulacionesresult[$i]->getPromedio(),
			'fechapostulacion' => $Postulacionesresult[$i]->getFechapostulacion()->format('Y-m-d'),
			'fecharevision' => $Postulacionesresult[$i]->getFechaRevisión(),			
			'semestre' =>$Postulacionesresult[$i]->getSemestre(),
			'imagencocina' => $Postulacionesresult[$i]->getImagenCocina(),
			'imagencuarto' => $Postulacionesresult[$i]->getImagenCuarto(),			
			'ciudadresidencia' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getCiudad()->getNombre(),
			'direccionresidencia' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getDireccion(),
			'visitaencontro' => $encontroVisita,
			'entrevistaencontro' => $encontroEntrevista,
			'coments' =>$Postulacionesresult[$i]->getComentPsicologa(),
			'estrato' =>$Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getEstrato(),
			'codigoestudiante' =>$Postulacionesresult[$i]->getUsuarioCarrera()->getCodigoEstudiante(),
			'carrera' =>$Postulacionesresult[$i]->getUsuarioCarrera()->getCarrera()->getNombrecarrera(),
			'estado_postulacion' =>$Postulacionesresult[$i]->getEstado_postulacion() , 
			'estudiante' => array('nombreestudiante' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getNombre() . " " . $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getApellido() , 
								  'identificacion' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getIdentifacion()));

}

if ($postulaciones === null) {
	echo "No convomipana found.\n";
	exit(1);
}

echo json_encode($postByIdConvo);