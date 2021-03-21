<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
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
	$postByIdEst[$i] =  array(
		'consecutivo_postulacion'     => $Postulacionesresult[$i]->getConsecutivo_postulacion(),
		'nombreConv'         => $Postulacionesresult[$i]-> getConvocatoria()->getConsecutivoBeca()->getDescripcion(),
		'idConvo'         => $Postulacionesresult[$i]-> getConvocatoria()->getConsecutivoConvocatoria(),
		'promedio'         => $Postulacionesresult[$i]->getPromedio(),
		'fechapostulacion' => $Postulacionesresult[$i]->getFechapostulacion()->format('Y-m-d H:i'),
		'semestre' =>$Postulacionesresult[$i]->getSemestre(),
		'estrato' =>$Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getEstrato() ,
		'estado_postulacion' =>$Postulacionesresult[$i]->getEstado_postulacion() , 
		'comentpsicologa' =>$Postulacionesresult[$i]->getComentPsicologa() , 
		'cantmodificaciones' =>$Postulacionesresult[$i]->getCantmodificaciones() , 
		'estudiante' => array('nombreestudiante' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getNombre() . " " . $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getApellido() ,
			'identificacion' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getIdentifacion() ,
			'correoest' => $Postulacionesresult[$i]->getUsuarioCarrera()->getUsuario()->getCorreo()));
}

if ($postulaciones === null) {
	echo "No convomipana found.\n";
	exit(1);
}

echo json_encode($postByIdEst);