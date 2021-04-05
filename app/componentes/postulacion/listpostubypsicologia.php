<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

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

for ($i=0; $i < sizeof($Postulacionesresult); $i++) { 
	$postByIdConvo[$i] =  array(
		'consecutivo_postulacion'     => $Postulacionesresult[$i]->getConsecutivo_postulacion(),
		'estadopromedio' => $Postulacionesresult[$i]->getEstadoPromedio(),
		'promedio'         => $Postulacionesresult[$i]->getPromedio(),
		'fechapostulacion' => $Postulacionesresult[$i]->getFechapostulacion()->format('Y-m-d H:i'),
		'semestre' =>$Postulacionesresult[$i]->getSemestre(),
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