<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
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
// $propiedadesConvo = get_object_vars($stdConvo['data']);

$convertfechainicial = date('Y-m-d  H:i:s', strtotime(str_replace('-','/', $stdConvo['fechainicio'])));
$convertfechafin = date('Y-m-d  H:i:s', strtotime(str_replace('-','/', $stdConvo['fechafin'])));

$correosbdconn = $entityManager->createQuery("
	SELECT u.correo
	FROM Usuarios u");

$correosbd = $correosbdconn->getResult();

$encontrarBeca = $entityManager->find('Becas',$stdConvo['becas']);

$fechainicial = new \DateTime($convertfechainicial);
$fechafin = new \DateTime($convertfechafin);
$encontrarPeriodo = $entityManager->find('Periodosacademicos',$stdConvo['periodo']);

$convocatorias = new Convocatorias();
$convocatorias->setEstadoConvocatoria($stdConvo['estadoconvocatoria']);
$convocatorias->setCupo($stdConvo['cupo']);
$convocatorias->setConsecutivoBeca($encontrarBeca);
$convocatorias->setConsecutivoPeriodo($encontrarPeriodo);
$convocatorias->setFechaInicio( new \DateTime($convertfechainicial));
$convocatorias->setFechaFin( new \DateTime($convertfechafin));



$entityManager->persist($convocatorias);
$entityManager->flush();


if(sizeof($stdConvo['documentossel']) != 0){
	for ($i=0; $i <  sizeof($stdConvo['documentossel']); $i++) { 
		$encontrarDoc = $entityManager->find('Documentos',$stdConvo['documentossel'][$i]);
		$documentConvo = new DocumentoConvocatoria();
		$documentConvo->setDocumento($encontrarDoc);
		$documentConvo->setConvocatoria($convocatorias);
		$entityManager->persist($documentConvo);
		$entityManager->flush();
	}
}




if($stdConvo['enviarCorreo'] == 1){


	$message = "<!DOCTYPE html>
	<html >
	<head>
	<link rel='preconnect' href='https://fonts.gstatic.com'>
	<link href='https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&display=swap' rel='stylesheet'>
	<title>Bienvenido</title>
	</head>
	<body style='padding-left: 20%;padding-right: 20%;' >


	<div align='center' esd-custom-block-id='52643' bgcolor='#3d85c6' style='background: url(https://tlr.stripocdn.email/content/guids/CABINET_3a7a698c62586f3eb3e12df4199718b8/images/6941564382201394.png);background-color: #3d85c6;background-position: center bottom;background-repeat: repeat;height: 103px;'>
	<div style='padding-top:25px;'><img src='https://i.ibb.co/RYp9ZPh/logosigbe2.png' width='100px'><img src='https://i.ibb.co/bvSpWDr/bienestar.png' width='100px'></div>
	</div>";
	$message .= "<div style='font-family:". "'Google Sans'" . ">";
	$message .="
	<h2 align='center'>! Se ha abierto una nueva convocatoria !
	No te quedes sin la oportunidad de participar. </h2>
	<ul>
	<li> Beca: <strong>" . $encontrarBeca->getDescripcion() .  "</strong> </li>
	<li> Fecha Convocatoria: <strong>" . $fechainicial->format('Y-m-d H:i:s') .  " hasta el " . $fechafin->format('Y-m-d H:i:s') . " </strong></li>
	<li> Cantidad de cupos: <strong>" . $stdConvo['cupo'] .  " </strong></li>
	<li> <strong>". $stdConvo['contenidocorreo'] . " </strong></li>
	<li> Inicia sesión para postularte YA: <strong> SIGBE </strong></li>




	</ul>
	</div>
	<footer align='center' style='background:url(https://tlr.stripocdn.email/content/guids/CABINET_3a7a698c62586f3eb3e12df4199718b8/images/75021564382669317.png);background-repeat: no-repeat;background-position: right; height: 65px;padding-top: 15px;'>

	<div style='text-align: center;'>
	<ul>
	<li style='list-style: none;display: inline-block;'>
	<img src='http://assets.stickpng.com/images/584ac2d03ac3a570f94a666d.png' width='30px'>
	</li>
	<li style='list-style: none;display: inline-block;'>
	<img src='http://assets.stickpng.com/images/580b57fcd9996e24bc43c521.png' width='30px'>
	</li>
	<li style='list-style: none;display: inline-block;'>
	<img src='https://logodownload.org/wp-content/uploads/2014/09/twitter-logo-3.png' width='30px'>
	</li>
	</div>


	</footer>


	</body>
	</html>";

	for ($i=0; $i < sizeof($correosbd) ; $i++) { 
		$oMail = new PHPMailer();
		$oMail->isSMTP();
		$oMail->Host='smtp.gmail.com';
		$oMail->Port=587;
		$oMail->SMTPSecure='tls';
		$oMail->SMTPAutoTLS = false;
		$oMail->SMTPAuth=true;
		$oMail->Username='haloalejo@gmail.com';
		$oMail->Password='Mrdark123';
		$oMail->setFrom($correosbd[$i]["correo"],'SIGBE - Gestion de becas UV');
		$oMail->addAddress($correosbd[$i]["correo"],'SIGBE - Gestion de becas UV');
		$oMail->Subject=$stdConvo['asuntocorreo'];
		$oMail->msgHTML($message);

		if(!$oMail->Send()) {
		// echo 'Mail error: '.$oMail->ErrorInfo; 
		} else {
		// echo 'Message sent!';

		}
	}
}
