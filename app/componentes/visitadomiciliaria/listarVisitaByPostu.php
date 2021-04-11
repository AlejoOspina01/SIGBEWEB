<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";

$idVisita = $_GET['idpostu'];

$visitasBuscada = $entityManager->createQuery('SELECT vd FROM VisitaDomiciliaria vd where  vd.postulacion = ?1')
->setParameter(1, $idVisita)
->getSingleResult();

if ($visitasBuscada === null) {
    echo "No visita found.\n";
    exit(1);
  }


$visitaarray =  array(
    'idvisita'      => $visitasBuscada->getIdVisita(),
    'postulacionid'     => $visitasBuscada->getPostulacion()->getConsecutivo_postulacion(),
    'codigoestpostu' => $visitasBuscada->getPostulacion()->getUsuarioCarrera()->getCodigoEstudiante(),
    'plancarrera' => $visitasBuscada->getPostulacion()->getUsuarioCarrera()->getCarrera()->getConsecutivoCarrera(),
    'ccvisita' => $visitasBuscada->getPostulacion()->getUsuarioCarrera()->getUsuario()->getIdentifacion(),
    'direccion' => $visitasBuscada->getPostulacion()->getUsuarioCarrera()->getUsuario()->getDireccion(),
    'estamento'     =>  $visitasBuscada->getEstamento(),
    'barrio'         => $visitasBuscada->getBarrio(),
    'comuna'         => $visitasBuscada->getComuna(),
    'nombreatencion'         => $visitasBuscada->getNombreAtencion(),
    'parentesco'      => $visitasBuscada->getParentesco(),
    'obligacion'     =>  $visitasBuscada->getObligacion(),
    'cualobligacion'     =>  $visitasBuscada->getCualObligacion(),
    'estratodane'     =>  $visitasBuscada->getEstratoDane(),
    'pagoarriendo'     =>  $visitasBuscada->getPagoArriendo(),
    'valorarriendo'         => $visitasBuscada->getValorArriendo(),
    'cubrearriendo'     =>  $visitasBuscada->getCubreArriendo(),
    'otroarriendo'     =>  $visitasBuscada->getOtroArriendo(),
    'fuenteingreso'     =>  $visitasBuscada->getFuenteIngreso(),
    'cualfuente'     =>  $visitasBuscada->getCualFuente(),
    'tipocasa'     =>  $visitasBuscada->getTipoCasa(),
    'aspectocasa'     =>  $visitasBuscada->getAspectoCasa(),
    'cualaspecto'     =>  $visitasBuscada->getCualAspecto(),
    'serviciopublico'     =>  $visitasBuscada->getServicioPublico(),
    'cuartosolicitante'     =>  $visitasBuscada->getCuartoSolicitante(),
    'cantidadpersonas'          => $visitasBuscada->getCantidadPersonas(),
    'descripcionfinal'     =>  $visitasBuscada->getDescripcionFinal(),  
    'fechavisita' => $visitasBuscada->getFechaRegistro()
  );

echo json_encode($visitaarray);