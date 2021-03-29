<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$periodoid=$_GET["idperiodo"];
$userid=$_GET["iduser"];

$encuestafound =$entityManager->createQuery('SELECT e FROM Encuesta e WHERE e.periodoacademico = ?1 AND e.usuario = ?2')
->setParameter(1,$periodoid)
->setParameter(2,$userid)
->getSingleResult();

    $arrayencuesta =  array(
     'idencuesta' =>  $encuestafound->getIdEncuesta(),
     'comentario' => $encuestafound->getComentario()
   );
  

echo json_encode($arrayencuesta);