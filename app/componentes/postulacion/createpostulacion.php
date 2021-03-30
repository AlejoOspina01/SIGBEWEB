<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once "../../../bootstrap.php";

error_reporting(E_ALL);
ini_set("display_errors", 1);

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


$stdPropPostu = get_object_vars($request);
$propiedadesPostu = get_object_vars($stdPropPostu['data']);
$convoProperty = get_object_vars($propiedadesPostu['convocatoria']);


$encontrarUser = $entityManager->createQuery("SELECT  u FROM UsuariosCarreras u  WHERE u.idusuariocarrera = ?1"    
)->setParameter(1,$propiedadesPostu['carrera']);
$Userfound = $encontrarUser->getSingleResult();

// $encontrarConvo = $entityManager->find('Convocatorias', $convoProperty['consecutivoconvo']);
$encontrarConvo = $entityManager->createQuery("SELECT  u FROM Convocatorias u  WHERE u.consecutivo_convocatoria = ?1")->setParameter(1,$convoProperty['consecutivoconvo']);
$convofound = $encontrarConvo->getSingleResult();

$fechaactual = strtotime(date("Y-m-d H:i",time()));
$fechaconvosel = strtotime($convofound->getFechaFin()->format("Y-m-d H:i"));

if($fechaactual > $fechaconvosel){
	echo " ERROR: La fecha de esa convocatoria ya paso.";
}else{
	
$postulacion = new Postulacion();
$postulacion->setPromedio($propiedadesPostu['promedio']);
$postulacion->setFechapostulacion( new \DateTime('now'));
$postulacion->setSemestre($propiedadesPostu['semestre']);
$postulacion->setEstado_postulacion('En espera');
$postulacion->setComentPsicologa('');

$postulacion->setUsuarioCarrera($Userfound);
$postulacion->setConvocatoria($convofound);
$postulacion->setCantmodificaciones(0);


$entityManager->persist($postulacion);
$entityManager->flush();

$archivoseparacion;
// var_dump($propiedadesPostu['listDocumentos']);
if(sizeof($propiedadesPostu['listDocumentos']) != 0){
	for ($i=0; $i <  sizeof($propiedadesPostu['listDocumentos']); $i++) { 
		$archivoseparacion = explode("|-|",$propiedadesPostu['listDocumentos'][$i]);
		$encontrarDoc = $entityManager->find('Documentos',$archivoseparacion[0]);
		$documentPostu = new DocumentoPostulacion();
		$documentPostu->setDocumento($encontrarDoc);
		$documentPostu->setPostulacion($postulacion);
		$documentPostu->setArchivo($archivoseparacion[1]);
		$documentPostu->setEstado(0);
		$entityManager->persist($documentPostu);
		$entityManager->flush();
	}
}
}
