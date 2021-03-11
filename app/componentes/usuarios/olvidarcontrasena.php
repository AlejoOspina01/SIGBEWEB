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

   //Carácteres para la contraseña
   $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
   $password = "";
   //Reconstruimos la contraseña segun la longitud que se quiera
   for($i=0;$i< 9;$i++) {
      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
      $password .= substr($str,rand(0,61),1);
   }
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$emailFound = get_object_vars($request);

try{

	$usuario = $entityManager->createQuery('SELECT u FROM Usuarios u WHERE u.correo = ?1')
->setParameter(1, $emailFound['email'])
->getResult();

$usuarioUpdate = $entityManager->createQueryBuilder();

$query = $usuarioUpdate->update('Usuarios', 'u') 
->set('u.contrasena', '?1')
->where('u.identificacion = ?2')
->setParameter(1, $password )
->setParameter(2, $usuario[0]->getIdentifacion())
->getQuery();        
$execute = $query->execute();


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
	<h2 align='center'>Se ha generado una nueva contraseña para su cuenta</h2>
	<ul>
	<li > Buen dia usuario : ". $emailFound['email'] . " </li>
	<li > Nueva contraseña : ". $password . " </li>
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

		$oMail = new PHPMailer();
		$oMail->isSMTP();
		$oMail->Host='smtp.gmail.com';
		$oMail->Port=587;
		$oMail->SMTPSecure='tls';
		$oMail->SMTPAutoTLS = false;
		$oMail->SMTPAuth=true;
		$oMail->Username='haloalejo@gmail.com';
		$oMail->Password='Mrdark123';
		$oMail->setFrom($emailFound['email'],'SIGBE - Gestion de becas UV');
		$oMail->addAddress($emailFound['email'],'SIGBE - Gestion de becas UV');
		$oMail->Subject='Nueva contraseña - SIGBE';
		$oMail->msgHTML($message);

		if(!$oMail->Send()) {
		// echo 'Mail error: '.$oMail->ErrorInfo; 
		} else {
		// echo 'Message sent!';

		}


}catch(Exception $e){

}

