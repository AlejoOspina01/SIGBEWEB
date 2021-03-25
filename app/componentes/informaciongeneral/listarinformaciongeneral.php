<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";

$idInformacion = $_GET['idinformaciongeneral'];


$informacionGeneral = $entityManager->createQuery('SELECT ig FROM InformacionGeneral ig WHERE ig.idinformaciongeneral =?1')
->setParameter(1, $idInformacion)
->getSingleResult();

$informacionParentesco = $entityManager->createQuery('SELECT p FROM Parentesco p WHERE p.informacionparentesco =?1')
->setParameter(1, $idInformacion)
->getSingleResult();

$informacionIngreso = $entityManager->createQuery('SELECT i FROM FuenteIngreso i WHERE i.informacionfuente =?1')
->setParameter(1, $idInformacion)
->getSingleResult();

$informacionBachillerato = $entityManager->createQuery('SELECT b FROM Bachillerato b WHERE b.informacionbachiller =?1')
->setParameter(1, $idInformacion)
->getSingleResult();


$informacionFamiliar = $entityManager->createQuery('SELECT f FROM InformacionFamiliar f WHERE f.informaciongeneral =?1')
->setParameter(1, $idInformacion)
->getSingleResult();

/*$informacionBuscada = $entityManager->createQuery("SELECT ig FROM InformacionGeneral ig WHERE ig.idinformaciongeneral =?1 IN (SELECT edad  FROM Parentesco p WHERE p.informacionparentesco=?1)");
$informacionBuscada->setParameter(1, $idInformacion);
$informacionresultado= $informacionBuscada->getResult();*/



if ($informacionGeneral === null) {
    echo "No found.\n";
    exit(1);
  }
  $informacionarray =  array(
    'idinformaciongeneral'      => $informacionGeneral->getIdinformacionGeneral(),
    'idpostulaciongeneral'     => $informacionGeneral->getPostulacion()->getConsecutivo_postulacion(),
    'lugarnacimiento'     =>  $informacionGeneral->getLugarNacimiento(),
    'expedicioncedula'         => $informacionGeneral->getExpedicionCedula(),
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
    'fecharegistro'          => $informacionGeneral->getFechaRegistro(), 
    'idparentesco'          => $informacionParentesco->getIdPariente(),
    'idgeneral'          => $informacionParentesco->getInformacionParentesco()->getIdinformacionGeneral(),
    'tipoparentesco'          => $informacionParentesco->getTipoParentesco()->getNombreParentesco(),
    'nombre'          => $informacionParentesco->getNombre(),
    'edad'          => $informacionParentesco->getEdad(),
    'direccion'          => $informacionParentesco->getDireccion(),
    'ciudad'          => $informacionParentesco->getCiudad(),
    'ocupacion'          => $informacionParentesco->getOcupacion(),
    'idfuenteingreso'          => $informacionIngreso->getIdFuenteIngreso(), 
    'nombreayuda'          => $informacionIngreso->getNombre(),
    'tiponecesidad'          => $informacionIngreso->getTipoNecesidad()->getNombre(),
    'idbachillerato'          => $informacionBachillerato->getIdBachillerato(),
    'colegio'          => $informacionBachillerato->getColegio(),
    'municipio'          => $informacionBachillerato->getMunicipioColegio(),
    'añogrado'          => $informacionBachillerato->getAñoGrado(),
    'pais'          => $informacionBachillerato->getPaisColegio(),
    'bachillericfes'          => $informacionBachillerato->getBachillerIcfes(),
    'añoicfes'          => $informacionBachillerato->getAñoIcfes(),
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
    'telefono'          => $informacionFamiliar->getTelefono(),

    
  );


echo json_encode($informacionarray);
/*$infoByIdGeneral;

for ($i=0; $i < sizeof($informacionresultado); $i++) { 
	$infoByIdGeneral[$i] =  array(
		'idinformaciongeneral'     => $informacionresultado[$i]->getIdinformacionGeneral(),
		'idpostulaciongeneral'         => $informacionresultado[$i]->getPostulacion()->getConsecutivo_postulacion(),
		'lugarnacimiento' => $informacionresultado[$i]->getLugarNacimiento(),
		'expedicioncedula' =>$informacionresultado[$i]->getExpedicionCedula(),
		'estadocivil' =>$informacionresultado[$i]->getEstadoCivil(),
		'numerohijos' =>$informacionresultado[$i]->getNumeroHijos(),
		'municipioprocedencia' =>$informacionresultado[$i]->getMunicipioProcedencia(),
		'direccion' =>$informacionresultado[$i]->getDireccion(),
		'barrio' =>$informacionresultado[$i]->getBarrio(),
        'nombre'          => $informacionresultado[$i]->getNombre());
    }

    echo json_encode($infoByIdGeneral);*/



