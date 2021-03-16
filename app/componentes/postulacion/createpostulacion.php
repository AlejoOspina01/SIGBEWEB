<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


$stdPropPostu = get_object_vars($request);
$propiedadesPostu = get_object_vars($stdPropPostu['data']);
$convoProperty = get_object_vars($propiedadesPostu['convocatoria']);


$encontrarUser = $entityManager->createQuery("SELECT  u FROM UsuariosCarreras u  WHERE u.idusuariocarrera = ?1"    
)->setParameter(1,$propiedadesPostu['carrera']);
$Userfound = $encontrarUser->getSingleResult();

$encontrarConvo = $entityManager->find('Convocatorias', $convoProperty['consecutivoconvo']);

$postulacion = new Postulacion();
$postulacion->setPromedio($propiedadesPostu['promedio']);
$postulacion->setFechapostulacion( new \DateTime('now'));
$postulacion->setSemestre($propiedadesPostu['semestre']);
$postulacion->setEstado_postulacion('En espera');
$postulacion->setComentPsicologa('');
// Booleanos
$postulacion->setD10($propiedadesPostu['d10']);
$postulacion->setFactservicio($propiedadesPostu['factservicio']);
$postulacion->setCartapeticion($propiedadesPostu['cartapeticion']);
$postulacion->setCarnetestudiante($propiedadesPostu['carnetestudiante']);
$postulacion->setCedulaPadre($propiedadesPostu['cedulapadre']);
$postulacion->setCedulamadre($propiedadesPostu['cedulamadre']);
$postulacion->setPromedioacumulado($propiedadesPostu['promedioacumulado']);
$postulacion->setTabulado($propiedadesPostu['tabulado']);
$postulacion->setConstanciaweb($propiedadesPostu['constanciaweb']);
$postulacion->setCertificadovencindad($propiedadesPostu['certificadovencidad']);
$postulacion->setDocumentoidentidad($propiedadesPostu['documentoestudiante']);
$postulacion->setDocumentoAcudiente($propiedadesPostu['documentoacudiente']);
$postulacion->setFormatosolicitud($propiedadesPostu['formatosolicitudbeneficio']);
$postulacion->setDiagnostico($propiedadesPostu['diagnosticomedico']);
$postulacion->setRecibomatricula($propiedadesPostu['recibopagomatricula']);
$postulacion->setCertificadoIngresos($propiedadesPostu['certificadoingresos']);

$postulacion->setUsuarioCarrera($Userfound);
$postulacion->setConvocatoria($encontrarConvo);
$postulacion->setCantmodificaciones(0);


$entityManager->persist($postulacion);
$entityManager->flush();