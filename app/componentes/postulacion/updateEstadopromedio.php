<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

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
$stdUser = get_object_vars($request);

$postuFound = $entityManager->createQuery('SELECT u FROM Postulacion u WHERE u.consecutivo_postulacion = ?1')
->setParameter(1, $stdUser['idpostu'])
->getSingleResult();

$postulacionUpdate = $entityManager->createQueryBuilder();
$query = $postulacionUpdate->update('Postulacion', 'p') 
->set('p.estadopromedio', '?2')
->where('p.consecutivo_postulacion = ?1')
->setParameter(1,$stdUser['idpostu'] )
->setParameter(2,$stdUser['valsel'] )
->getQuery();
$execute = $query->execute();
if ($postulacionUpdate === null) {
	echo "No postulacion found.\n";
	echo "Fallo";    
	exit(1);
}  