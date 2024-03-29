<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET"); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$postulaciones = $entityManager->createQuery("
	SELECT  u 
	FROM Postulacion u  WHERE u.estado_postulacion  = 'En espera'  
	"    
);

$postuactivas= $postulaciones-> getResult();

$postulacionesActivas;


for($i=0 ; $i< sizeof($postuactivas); $i++){

	$postulacionesActivas[$i]= array('nombre' => $postuactivas[$i]->getUsuarioCarrera()->getUsuario()->getNombre(),
		'consecutivo_postulacion' =>$postuactivas[$i]->getConsecutivo_postulacion(),
		'promedio' => $postuactivas[$i]->getPromedio(),
		'fechapostulacion' =>  $postuactivas[$i]->getFechapostulacion(),
		'semestre' => $postuactivas[$i]->getSemestre(),
		'estrato' =>  $postuactivas[$i]->getUsuarioCarrera()->getUsuario()->getEstrato(),
		'convocatoria' =>  $postuactivas[$i]-> getConvocatoria()->getConsecutivoBeca()->getDescripcion(),
		'estado' => $postuactivas[$i]->getEstado_postulacion(),


	);
	
}

echo json_encode($postulacionesActivas);