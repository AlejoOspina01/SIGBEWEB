<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";

$idconvo = $_GET["idconvo"];
$benefound = $entityManager->createQuery('SELECT u FROM Beneficiarios u WHERE u.convocatoria = ?1')
->setParameter(1, $idconvo)
->getResult();


$carrerasarray;
for ($i=0; $i < sizeof($benefound); $i++) { 
  	$carrerasarray[$i] =  array(
		'codigo_postulacion'     => $benefound[$i]->getPostulacion()->getConsecutivo_postulacion(),
		'estado_promedio' => $benefound[$i]->getPostulacion()->getEstadoPromedio(),
		'promedio'         => $benefound[$i]->getPostulacion()->getPromedio(),
		'Observacion' => $benefound[$i]->getObservacion(),
		'ciudad_residencia' => $benefound[$i]->getPostulacion()->getUsuarioCarrera()->getUsuario()->getCiudad()->getNombre(),
		'direccion_residencia' => $benefound[$i]->getPostulacion()->getUsuarioCarrera()->getUsuario()->getDireccion(),
		'fecha_postulacion' => $benefound[$i]->getPostulacion()->getFechapostulacion()->format('Y-m-d'),
		'semestre' =>$benefound[$i]->getPostulacion()->getSemestre(),
		'coments' =>$benefound[$i]->getPostulacion()->getComentPsicologa(),
		'estrato' =>$benefound[$i]->getPostulacion()->getUsuarioCarrera()->getUsuario()->getEstrato(),
		'codigo_estudiante' =>$benefound[$i]->getPostulacion()->getUsuarioCarrera()->getCodigoEstudiante(),
		'carrera' =>$benefound[$i]->getPostulacion()->getUsuarioCarrera()->getCarrera()->getNombrecarrera(),
		'estado_postulacion' =>$benefound[$i]->getPostulacion()->getEstado_postulacion() , 
		'nombre_estudiante' => $benefound[$i]->getPostulacion()->getUsuarioCarrera()->getUsuario()->getNombre() . " " . $benefound[$i]->getPostulacion()->getUsuarioCarrera()->getUsuario()->getApellido(),
		'identificacion' =>$benefound[$i]->getPostulacion()->getUsuarioCarrera()->getUsuario()->getIdentifacion()
	);
}
echo json_encode($carrerasarray);