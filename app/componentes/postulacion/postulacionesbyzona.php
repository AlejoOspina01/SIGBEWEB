<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET"); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$zonaurbana = 'Urbana';
$zonarural = 'Rural';
$postulacionesubarna = $entityManager->createQuery("SELECT COUNT(u) FROM Postulacion u, Usuarios us , UsuariosCarreras s WHERE u.usuariocarrera = s.idusuariocarrera AND s.usuario = us.identificacion AND us.zonaresidencial = ?1")
->setParameter(1,$zonaurbana);



$postuurbana= $postulacionesubarna->getSingleResult();

$postulacionesrural = $entityManager->createQuery("SELECT COUNT(u) FROM Postulacion u, Usuarios us , UsuariosCarreras s WHERE u.usuariocarrera = s.idusuariocarrera AND s.usuario = us.identificacion AND us.zonaresidencial = ?1")
->setParameter(1,$zonarural);

$postusrural= $postulacionesrural->getSingleResult();

$postulacionesActivas;


$postulacionesActivas= array(
	'canturbana' => $postuurbana[1],
	'cantrural' =>$postusrural[1],
);


echo json_encode($postulacionesActivas);