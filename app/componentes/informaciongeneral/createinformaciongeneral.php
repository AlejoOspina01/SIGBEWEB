<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdGeneral = get_object_vars($request);
$convertexpedicion = new DateTime($stdGeneral['expedicioncedula']);
//$propiedadesGeneral = get_object_vars($stdGeneral['data']);

//var_dump($stdGeneral);

//IFORMACION GENERAL
$encontrarPostulacion = $entityManager->find('Postulacion',$stdGeneral['idpostulaciongeneral']);
$general = new  InformacionGeneral();
$general->setPostulacion($encontrarPostulacion);
$general->setLugarNacimiento($stdGeneral['lugarnacimiento']);
$general->setExpedicionCedula($convertexpedicion);
$general->setEstadoCivil($stdGeneral['estadocivil']);
$general->setNumeroHijos($stdGeneral['numerohijos']);
$general->setMunicipioProcedencia($stdGeneral['municipioprocedencia']);
$general->setDireccion($stdGeneral['direccion']);
$general->setBarrio($stdGeneral['barrio']);
$general->setTelefono($stdGeneral['telefono']);
$general->setDireccionCali($stdGeneral['direccioncali']);
$general->setBarrioCali($stdGeneral['barriocali']);
$general->setTelefonoCali($stdGeneral['telefonocali']);
$general->setResidencia($stdGeneral['residencia']);
$general->setTrabaja($stdGeneral['trabaja']);
$general->setCargoTrabajador($stdGeneral['cargotrabajador']);
$general->setNombreEmpresa($stdGeneral['nombreempresa']);
$general->setAntiguedad($stdGeneral['antiguedad']);
$general->setCiudadEmpresa($stdGeneral['ciudadempresa']);
$general->setDireccionEmpresa($stdGeneral['direccionempresa']);
$general->setValorTotalIngreso($stdGeneral['valortotalingreso']);
$general->setObservacion($stdGeneral['observacion']);
$general->setFechaRegistro(new \DateTime('now'));


$entityManager->persist($general);
$entityManager->flush();


//PARENTESCO
$tipoparentesco =  $entityManager->find('TipoParentesco', $stdGeneral['tipoparentesco']);

$parentesco = new Parentesco();
$parentesco->setInformacionParentesco($general);
$parentesco->setTipoParentesco($tipoparentesco);
$parentesco->setNombre($stdGeneral['nombrepariente']);
$parentesco->setEdad($stdGeneral['edad']);
$parentesco->setDireccion($stdGeneral['direccionpariente']);
$parentesco->setCiudad($stdGeneral['ciudad']);
$parentesco->setOcupacion($stdGeneral['ocupacion']);
$parentesco->setIngresos($stdGeneral['ingresos']);

$entityManager->persist($parentesco);
$entityManager->flush();

/*$archivoseparacion;
if(sizeof($propiedadesGeneral['listaParentesco']) != 0){
	for ($i=0; $i <  sizeof($propiedadesGeneral['listaParentesco']); $i++) { 
		$archivoseparacion = explode("|-|",$propiedadesGeneral['listaParentesco'][$i]);
		$encontrarParentesco = $entityManager->find('Parentesco',$archivoseparacion[0]);
            $parentesco = new Parentesco();
            $parentesco->setInformacionParentesco($general);
            $parentesco->setTipoParentesco($tipoparentesco);
            $parentesco->setNombre($stdGeneral['nombrepariente']);
            $parentesco->setEdad($stdGeneral['edad']);
            $parentesco->setDireccion($stdGeneral['direccionpariente']);
            $parentesco->setCiudad($stdGeneral['ciudad']);
            $parentesco->setOcupacion($stdGeneral['ocupacion']);
            $parentesco->setIngresos($stdGeneral['ingresos']);
            $entityManager->persist($parentesco);
            $entityManager->flush();
	}
}*/
//FUENTE INGRESO
$tiponecesidad =  $entityManager->find('TipoNecesidad', $stdGeneral['tiponecesidad']);
$fuente = new FuenteIngreso();
$fuente->setInformacionFuente($general);
$fuente->setTipoNecesidad($tiponecesidad);
$fuente->setNombre($stdGeneral['nombre']);

$entityManager->persist($fuente);
$entityManager->flush();

//Bachillerato
$bachiller = new Bachillerato();
$bachiller->setInformacionBachiller($general);
$bachiller->setColegio($stdGeneral['colegio']);
$bachiller->setMunicipio($stdGeneral['municipio']);
$bachiller->setAñoGrado($stdGeneral['añogrado']);
$bachiller->setPais($stdGeneral['pais']);
$bachiller->setBachillerIcfes($stdGeneral['bachillericfes']);
$bachiller->setAñoIcfes($stdGeneral['añoicfes']);
$bachiller->setCaracterColegio($stdGeneral['caractercolegio']);
$bachiller->setValorMatricula($stdGeneral['valormatricula']);
$bachiller->setValorPension($stdGeneral['valorpension']);

$entityManager->persist($bachiller);
$entityManager->flush();

//InformacionFamiliar
$familiar = new InformacionFamiliar();
$familiar->setInformaciongeneral($general);
$familiar->setCasaPropia($stdGeneral['casapropia']);
$familiar->setHipoteca($stdGeneral['hipoteca']);
$familiar->setValorMensualAmortizacion($stdGeneral['valormensualamortizacion']);
$familiar->setMensualArriendo($stdGeneral['valormensualarriendo']);
$familiar->setJefeFamilia($stdGeneral['jefefamilia']);
$familiar->setNivelEducativoJefe($stdGeneral['niveleducativojefe']);
$familiar->setIngresoMensualFamiliar($stdGeneral['ingresomensualfamiliar']);
$familiar->setPosicionJefe($stdGeneral['posicionjefe']);
$familiar->setEmpresaJefe($stdGeneral['empresajefe']);
$familiar->setOcupacionJefe($stdGeneral['ocupacionjefe']);
$familiar->setIngresoJefe($stdGeneral['ingresojefe']);
$familiar->setDireccionEmpresaJefe($stdGeneral['direccionempresajefe']);
$familiar->setCiudad($stdGeneral['ciudadjefe']);
$familiar->setTelefono($stdGeneral['telefonojefe']);

$entityManager->persist($familiar);
$entityManager->flush();