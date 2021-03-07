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


$encontrarUser = $entityManager->find('Usuarios', $propiedadesPostu['usuario']);
$encontrarConvo = $entityManager->find('Convocatorias', $propiedadesPostu['convocatoria']);


$postulacion = new Postulacion();
$postulacion->setPromedio($propiedadesPostu['promedio']);
$postulacion->setFechapostulacion( new \DateTime('now'));
$postulacion->setSemestre($propiedadesPostu['semestre']);
$postulacion->setEstado_postulacion('En espera');
$postulacion->setComentPsicologa('');
// Booleanos
$postulacion->setD10($propiedadesConvo['d10']);
$postulacion->setFactservicio($propiedadesConvo['factserv']);
$postulacion->setCartapeticion($propiedadesConvo['cartapeti']);
$postulacion->setCarnetestudiante($propiedadesConvo['carnetest']);
$postulacion->setCedulaPadre($propiedadesConvo['cedulapadre']);
$postulacion->setCedulamadre($propiedadesConvo['cedulamadre']);
$postulacion->setPromedioacumulado($propiedadesConvo['promedio']);
$postulacion->setTabulado($propiedadesConvo['tabulado']);
$postulacion->setConstanciaweb($propiedadesConvo['constanciaweb']);
$postulacion->setCertificadovencindad($propiedadesConvo['certificadovecindad']);
$postulacion->setDocumentoidentidad($propiedadesConvo['documentoidentí']);
$postulacion->setDocumentoAcudiente($propiedadesConvo['documentoacudiente']);
$postulacion->setFormatosolicitud($propiedadesConvo['formatosolicitud']);
$postulacion->setDiagnostico($propiedadesConvo['diagnostico']);
$postulacion->setRecibomatricula($propiedadesConvo['recibomatricula']);
$postulacion->setCertificadoIngresos($propiedadesConvo['certificadoingresos']);

$postulacion->setUsuario($encontrarUser);
$postulacion->setConvocatoria($encontrarConvo);
$postulacion->setCantmodificaciones(0);


$entityManager->persist($postulacion);
$entityManager->flush();