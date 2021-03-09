<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET"); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$becasel = $_GET['becasel'];

$carrerasnombres = array('Arquitectura','Comunicacion Social Periodismo','Musica','Licenciatura en Artes Visuales','Licenciatura en Danza Clasica','Licenciatura en Arte Dramatico','Licenciatura en Arte Dramatico','Licenciatura en Música','Licenciatura en Música','Diseño Grafico','Diseño Industrial','Biologia','Fisica','Matematicas','Quimica','Tecnologia Quimica','Administracion de Empresas','Administracion Pública','Contaduria Pública','Comercio Exterior','Tecnologia en Gestion Portuaria',
'Tecnologia en Direccion de Empresas Turisticas y Hoteleras','Bacteriologia y Laboratorio Clinico','Enfermeria','Fisioterapia','Fonoaudiologia','Medicina y Cirugia','Odontologia','Terapia Ocupacional','Tecnologia en Atencion Prehospitalaria','Economia','Sociologia','Geografia','Filosofia','Historia','Licenciatura en Educacion Basica con Énfasis en Ciencias Sociales','Licenciatura en Filosofia','Licenciatura en Historia','Licenciatura en Lenguas Extranjeras Inglés-Francés','Licenciatura en Literatura','Tecnologia en Interpretacion para Sordos y Sordociegos','Trabajo Social','Estadistica',
'Ingenieria Agricola','Ingenieria Civil','Ingenieria de Alimentos','Ingenieria de Materiales','Ingenieria de Sistemas','Ingenieria Eléctrica','Ingenieria Electronica','Ingenieria Industrial','Ingenieria Mecanica','Ingenieria Quimica','Ingenieria Sanitaria y Ambiental','Ingenieria Topografica','Tecnologia de Alimentos','Tecnologia en Ecologia y Manejo Ambiental','Tecnologia en Electronica',
'Tecnologia en Manejo y Conservacion de Suelos y Aguas','Tecnologia en Sistemas de Informacion','Programa de Primera Infancia','Licenciatura en Matematicas','Licenciatura en Ciencias Naturales y Educacion Ambiental','Estudios Politicos y Resolucion de Conflictos','Licenciatura en Educacion Popular','Licenciatura en Educacion Fisica y Deportes','Licenciatura en Matematicas');
$carrerascant = array();
$nombresfound = array();
$arrayfull = array();
$numberi = 0;
for ($i=1; $i <= 68; $i++) { 
	$postulacionescarreras = $entityManager->createQuery("SELECT COUNT(p) FROM Postulacion p, Convocatorias c, UsuariosCarreras u WHERE p.convocatoria = c.consecutivo_convocatoria AND p.usuario = u.usuario AND u.carrera = ?1 AND c.becas = ?2")
->setParameter(1,$i)
->setParameter(2,$becasel);

$postconsult= $postulacionescarreras->getSingleResult();
	if($postconsult[1] != 0){

			$carrerascant[$numberi] = $postconsult[1];
			$nombresfound[$numberi] = $carrerasnombres[$i - 1];
			$numberi++;
	}

}

array_push($arrayfull,$carrerascant);
array_push($arrayfull,$nombresfound);

echo json_encode($arrayfull);
