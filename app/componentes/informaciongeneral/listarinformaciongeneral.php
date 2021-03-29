<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";

$idInformacion = $_GET['idpostu'];


$informacionGeneral = $entityManager->createQuery('SELECT ig FROM InformacionGeneral ig WHERE ig.idpostulaciongeneral =?1')
->setParameter(1, $idInformacion)
->getSingleResult();

$informacionParentesco = $entityManager->createQuery('SELECT p FROM Parentesco p WHERE p.informacionparentesco =?1')
->setParameter(1, $informacionGeneral->getIdinformacionGeneral())
->getResult();

$informacionIngreso = $entityManager->createQuery('SELECT i FROM FuenteIngreso i WHERE i.informacionfuente =?1')
->setParameter(1, $informacionGeneral->getIdinformacionGeneral())
->getResult();

$informacionBachillerato = $entityManager->createQuery('SELECT b FROM Bachillerato b WHERE b.informacionbachiller =?1')
->setParameter(1, $informacionGeneral->getIdinformacionGeneral())
->getSingleResult();


$informacionFamiliar = $entityManager->createQuery('SELECT f FROM InformacionFamiliar f WHERE f.informaciongeneral =?1')
->setParameter(1, $informacionGeneral->getIdinformacionGeneral())
->getSingleResult();

/*$informacionBuscada = $entityManager->createQuery("SELECT ig FROM InformacionGeneral ig WHERE ig.idinformaciongeneral =?1 IN (SELECT edad  FROM Parentesco p WHERE p.informacionparentesco=?1)");
$informacionBuscada->setParameter(1, $idInformacion);
$informacionresultado= $informacionBuscada->getResult();*/



if ($informacionGeneral === null) {
    echo "No found.\n";
    exit(1);
  }

  $infoParentescto;
  $infoFuente;
  $informacionarray =  array(
    'idinformaciongeneral'      => $informacionGeneral->getIdinformacionGeneral(),
    'idpostulaciongeneral'     => $informacionGeneral->getPostulacion()->getConsecutivo_postulacion(),
    'lugarnacimiento'     =>  $informacionGeneral->getLugarNacimiento(),
    'nombrepostulante' => $informacionGeneral->getPostulacion()->getUsuarioCarrera()->getUsuario()->getNombre() . " " .  $informacionGeneral->getPostulacion()->getUsuarioCarrera()->getUsuario()->getApellido() ,
    'codigopostulante' => $informacionGeneral->getPostulacion()->getUsuarioCarrera()->getCodigoEstudiante(),
    'codigocarrerapostulante' => $informacionGeneral->getPostulacion()->getUsuarioCarrera()->getCarrera()->getConsecutivoCarrera(),
    'fechanacimientopostulante' => $informacionGeneral->getPostulacion()->getUsuarioCarrera()->getUsuario()->getFechanacimiento()->format('Y-m-d'),
    'cedulapostulante' => $informacionGeneral->getPostulacion()->getUsuarioCarrera()->getUsuario()->getIdentifacion(),
    'expedicioncedula'         => $informacionGeneral->getExpedicionCedula()->format('Y-m-d'),
    'estadocivil'         => $informacionGeneral->getEstadoCivil(),
    'numerohijos'         => $informacionGeneral->getNumeroHijos(),
    'municipioprocedencia'      => $informacionGeneral->getMunicipioProcedencia(),
    'direccion'     =>  $informacionGeneral->getDireccion(),
    'barrio'     =>  $informacionGeneral->getBarrio(),
    'telefono'     =>  $informacionGeneral->getTelefono(),
    'direccioncali'     =>  $informacionGeneral->getDireccionCali(),
    'barriocali'         => $informacionGeneral->getBarrioCali(),
    'telefonocali'     =>  $informacionGeneral->getTelefonoCali(),
    'residencia'     =>  $informacionGeneral->getResidencia(),
    'trabaja'     =>  $informacionGeneral->getTrabaja(),
    'cargotrabajador'     =>  $informacionGeneral->getCargoTrabajador(),
    'nombreempresa'     =>  $informacionGeneral->getNombreEmpresa(),
    'antiguedad'     =>  $informacionGeneral->getAntiguedad(),
    'ciudadempresa'     =>  $informacionGeneral->getCiudadEmpresa(),
    'direccionempresa'     =>  $informacionGeneral->getDireccionEmpresa(),
    'valortotalingreso'     =>  $informacionGeneral->getValorTotalIngreso(),
    'observacion'     =>  $informacionGeneral->getObservacion(),
    'fecharegistro'          => $informacionGeneral->getFechaRegistro()->format('Y-m-d'),
    'idbachillerato'          => $informacionBachillerato->getIdBachillerato(),
    'colegio'          => $informacionBachillerato->getColegio(),
    'municipio'          => $informacionBachillerato->getMunicipioColegio(),
    'aniogrado'          => $informacionBachillerato->getAñoGrado(),
    'pais'          => $informacionBachillerato->getPaisColegio(),
    'bachillericfes'          => $informacionBachillerato->getBachillerIcfes(),
    'anioicfes'          => $informacionBachillerato->getAñoIcfes(),
    'caractercolegio'          => $informacionBachillerato->getCaracterColegio(),
    'valormatricula'          => $informacionBachillerato->getValorMatricula(),
    'valorpension'          => $informacionBachillerato->getValorPension(),
    'idinformacionfamiliar'          => $informacionFamiliar->getInformacionFamiliar(),
    'casapropia'          => $informacionFamiliar->getCasaPropia(),
    'hipoteca'          => $informacionFamiliar->getHipoteca(),
    'valormensualamortizacion'          => $informacionFamiliar->getValorMensualAmortizacion(),
    'valormensualarriendo'          => $informacionFamiliar->getValorMensualArriendo(),
    'jefefamilia'          => $informacionFamiliar->getJefeFamilia(),
    'niveleducativojefe'          => $informacionFamiliar->getNivelEducativoJefe(),
    'ingresomensualfamiliar'          => $informacionFamiliar->getIngresoMensualFamiliar(),
    'posicionjefe'          => $informacionFamiliar->getPosicionJefe(),
    'empresajefe'          => $informacionFamiliar->getEmpresaJefe(),
    'ocupacionjefe'          => $informacionFamiliar->getOcupacionJefe(),
    'ingresojefe'          => $informacionFamiliar->getIngresoJefe(),
    'direccionempresajefe'          => $informacionFamiliar->getDireccionEmpresaJefe(),
    'ciudadjefe'          => $informacionFamiliar->getCiudad(),
    'telefono'          => $informacionFamiliar->getTelefono());

  for ($i=0; $i < sizeof($informacionParentesco); $i++) {
    $infoParentescto[$i] =  array(
      'idparentesco'          => $informacionParentesco[$i]->getIdPariente(),
      'idgeneral'          => $informacionParentesco[$i]->getInformacionParentesco()->getIdinformacionGeneral(),
      'tipoparentesco'          => $informacionParentesco[$i]->getTipoParentesco()->getNombreParentesco(),
      'nombre'          => $informacionParentesco[$i]->getNombre(),
      'edad'          => $informacionParentesco[$i]->getEdad(),
      'direccion'          => $informacionParentesco[$i]->getDireccion(),
      'ciudad'          => $informacionParentesco[$i]->getCiudad(),
      'ocupacion'          => $informacionParentesco[$i]->getOcupacion());
    }
    for ($i=0; $i < sizeof($informacionIngreso); $i++) {
      $infoFuente[$i] =  array(
      'idfuenteingreso'          => $informacionIngreso[$i]->getIdFuenteIngreso(), 
      'nombreayuda'          => $informacionIngreso[$i]->getNombre(),
      'tiponecesidad'          => $informacionIngreso[$i]->getTipoNecesidad()->getNombre());
    }
    array_push($informacionarray, array($infoParentescto),array($infoFuente));
    echo json_encode($informacionarray);