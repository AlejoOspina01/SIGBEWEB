<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once "../../../bootstrap.php";

$idest = $_GET['idest'];
$postulaciones = $entityManager->createQuery("SELECT p FROM Postulacion p WHERE p.usuario = ?1");
$postulaciones->setParameter(1,$idest);
$Postulacionesresult = $postulaciones->getResult();

$postByIdEst;

for ($i=0; $i < sizeof($Postulacionesresult); $i++) { 
	$postByIdEst[$i] =  array(
	    'consecutivo_postulacion'     => $Postulacionesresult[$i]->getConsecutivo_postulacion(),
        'promedio'         => $Postulacionesresult[$i]->getPromedio(),
		'fechapostulacion' => $Postulacionesresult[$i]->getFechapostulacion()->format('Y-m-d H:i'),
		'semestre' =>$Postulacionesresult[$i]->getSemestre(),
		'estrato' =>$Postulacionesresult[$i]->getEstrato() ,
		'estado_postulacion' =>$Postulacionesresult[$i]->getEstado_postulacion() , 
		'estudiante' => array('nombreestudiante' => $Postulacionesresult[$i]->getUsuario()->getNombre() . " " . $Postulacionesresult[$i]->getUsuario()->getApellido() , 'identificacion' => $Postulacionesresult[$i]->getUsuario()->getIdentifacion()));
}

if ($postulaciones === null) {
    echo "No convomipana found.\n";
    exit(1);
}

echo json_encode($postByIdEst);