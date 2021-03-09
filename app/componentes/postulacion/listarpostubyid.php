<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";

$idConvo = $_GET['idconvo'];
$postulaciones = $entityManager->createQuery("SELECT p FROM Postulacion p , UsuariosCarreras uc, Carreras c, Usuarios u where p.usuariocarrera=uc.idusuariocarrera AND uc.usuario = u.identificacion AND uc.carrera=c.codigocarrera AND p.convocatoria = ?1");
//("SELECT p FROM Postulacion p, Usuarios u , UsuariosCarreras uc, Carreras c WHERE p.usuariocarrera=u.identificacion AND u.identificacion=uc.usuario AND uc.carrera=c.codigocarrera AND p.convocatoria = ?1");
$postulaciones->setParameter(1,$idConvo);
$Postulacionesresult = $postulaciones->getResult();

$postByIdConvo;

for ($i=0; $i < sizeof($Postulacionesresult); $i++) { 
	$postByIdConvo[$i] =  array(
		'consecutivo_postulacion'     => $Postulacionesresult[$i]->getConsecutivo_postulacion(),
		'promedio'         => $Postulacionesresult[$i]->getPromedio(),
		'fechapostulacion' => $Postulacionesresult[$i]->getFechapostulacion()->format('Y-m-d H:i'),
		'semestre' =>$Postulacionesresult[$i]->getSemestre(),
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