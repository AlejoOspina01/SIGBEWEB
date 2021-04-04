<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
require '../../../lib/PhpMailer/Exception.php';
require '../../../lib/PhpMailer/PHPMailer.php';
require '../../../lib/PhpMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdConvo = get_object_vars($request);
$propiedadesPostu = get_object_vars($stdConvo['data']);

$postuFound = $entityManager->createQuery('SELECT u FROM Postulacion u WHERE u.consecutivo_postulacion = ?1')
->setParameter(1, $propiedadesPostu['idpostu'])
->getSingleResult();

$postulacionUpdate = $entityManager->createQueryBuilder();
$query = $postulacionUpdate->update('Postulacion', 'p') 
->set('p.estado_postulacion', '?2')
->where('p.consecutivo_postulacion = ?1')
->setParameter(1,$propiedadesPostu['idpostu'] )
->setParameter(2,$propiedadesPostu['estadopostu'] )
->getQuery();
$execute = $query->execute();
if ($postulacionUpdate === null) {
	echo "No postulacion found.\n";
	echo "Fallo";    
	exit(1);
}  

try{

	$textoArchivo = file("../configuracion/config.txt");
	$variables= array();
	// Mostrar el contenido del archivo:
	for ($i=0; $i < sizeof($textoArchivo); $i++) { 
		array_push($variables, explode("|",$textoArchivo[$i]));
	}

	for ($i=0; $i < sizeof($variables); $i++) { 
		$variables[$i][1] = trim($variables[$i][1]);
	}

	$message = "<!DOCTYPE html>
	<html >
	<head>
	<link rel='preconnect' href='https://fonts.gstatic.com'>
	<link href='https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&display=swap' rel='stylesheet'>
	<title>Estado actualizado</title>
	</head>
	<body>


	<div align='center' esd-custom-block-id='52643' bgcolor='#3d85c6' style='background: url(https://tlr.stripocdn.email/content/guids/CABINET_3a7a698c62586f3eb3e12df4199718b8/images/6941564382201394.png);background-color: #3d85c6;background-position: center bottom;background-repeat: repeat;height: 103px;'>
	<div style='padding-top:25px;'><img src='https://i.ibb.co/RYp9ZPh/logosigbe2.png' width='100px'><img src='https://i.ibb.co/bvSpWDr/bienestar.png' width='100px'></div>
	</div>";
	$message .= "<div style='padding-top: 4em;padding-bottom: 4em;" . ">";
	$message .="
	<h2 align='center'>El estado de su postulacion fue actualizado</h2>
	<ul>
	<li > Buen dia usuario : ". $postuFound->getUsuarioCarrera()->getUsuario()->getCorreo() . " </li>
	<li > Su postulación con codigo #  : ". $postuFound->getConsecutivo_postulacion() . " fue actualizada el estado a ' " . $postuFound->getEstado_postulacion()  . " ', para mas información ingrese a SIGBE.</li>
	</ul>
	</div>
	<footer align='center' style='background:url(https://tlr.stripocdn.email/content/guids/CABINET_3a7a698c62586f3eb3e12df4199718b8/images/75021564382669317.png);background-repeat: no-repeat;background-position: right; height: 65px;padding-top: 15px;'>
	</footer>


	</body>
	</html>";

		$oMail = new PHPMailer();
		$oMail->isSMTP();
		$oMail->Host='smtp.gmail.com';
		$oMail->Port=587;
		$oMail->SMTPSecure='tls';
		$oMail->SMTPAutoTLS = false;
		$oMail->SMTPAuth=true;
		$oMail->isHTML(true);
		$oMail->Username=$variables[8][1];
		$oMail->Password=$variables[9][1];
		$oMail->setFrom($postuFound->getUsuarioCarrera()->getUsuario()->getCorreo(),'SIGBE - Gestion de becas UV');
		$oMail->addAddress($postuFound->getUsuarioCarrera()->getUsuario()->getCorreo(),'SIGBE - Gestion de becas UV');
		$oMail->Subject='Estado de la postulacion a sido actualizada';
		$oMail->msgHTML($message);

		if(!$oMail->Send()) {
		// echo 'Mail error: '.$oMail->ErrorInfo; 
		} else {
		// echo 'Message sent!';

		}


}catch(Exception $e){

}