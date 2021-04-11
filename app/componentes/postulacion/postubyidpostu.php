<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";

$idConvo = $_GET['idpostu'];
$postulaciones = $entityManager->createQuery("SELECT p FROM Postulacion p WHERE p.consecutivo_postulacion = ?1");
//("SELECT p FROM Postulacion p, Usuarios u , UsuariosCarreras uc, Carreras c WHERE p.usuariocarrera=u.identificacion AND u.identificacion=uc.usuario AND uc.carrera=c.codigocarrera AND p.convocatoria = ?1");
$postulaciones->setParameter(1,$idConvo);
$Postulacionesresult = $postulaciones->getSingleResult();

	$postByIdConvo =  array(
		'consecutivo_postulacion'     => $Postulacionesresult->getConsecutivo_postulacion(),
		'estadopromedio' => $Postulacionesresult->getEstadoPromedio(),
		'idconvo' => $Postulacionesresult->getConvocatoria()->getConsecutivoConvocatoria(),
		'promedio'         => $Postulacionesresult->getPromedio(),
		'fechapostulacion' => $Postulacionesresult->getFechapostulacion()->format('Y-m-d H:i'),
		'semestre' =>$Postulacionesresult->getSemestre(),
		'coments' =>$Postulacionesresult->getComentPsicologa(),
		'estrato' =>$Postulacionesresult->getUsuarioCarrera()->getUsuario()->getEstrato(),
		'codigoestudiante' =>$Postulacionesresult->getUsuarioCarrera()->getCodigoEstudiante(),
		'carrera' =>$Postulacionesresult->getUsuarioCarrera()->getCarrera()->getNombrecarrera(),
		'estado_postulacion' =>$Postulacionesresult->getEstado_postulacion() , 
		'estudiante' => array('nombreestudiante' => $Postulacionesresult->getUsuarioCarrera()->getUsuario()->getNombre() . " " . $Postulacionesresult->getUsuarioCarrera()->getUsuario()->getApellido() , 
							  'identificacion' => $Postulacionesresult->getUsuarioCarrera()->getUsuario()->getIdentifacion()));


if ($postulaciones === null) {
	echo "No convomipana found.\n";
	exit(1);
}

echo json_encode($postByIdConvo);