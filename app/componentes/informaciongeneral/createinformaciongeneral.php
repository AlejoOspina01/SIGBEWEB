<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdGeneral = get_object_vars($request);

$propiedadesGeneral = get_object_vars($stdGeneral['data']);
$convertexpedicion = new DateTime($propiedadesGeneral['expedicioncedula']);
//var_dump($stdGeneral);

//IFORMACION GENERAL
$encontrarPostulacion = $entityManager->find('Postulacion',$propiedadesGeneral['idpostulaciongeneral']);
$general = new  InformacionGeneral();
$general->setPostulacion($encontrarPostulacion);
$general->setLugarNacimiento($propiedadesGeneral['lugarnacimiento']);
$general->setExpedicionCedula($convertexpedicion);
$general->setEstadoCivil($propiedadesGeneral['estadocivil']);
$general->setNumeroHijos($propiedadesGeneral['numerohijos']);
$general->setMunicipioProcedencia($propiedadesGeneral['municipioprocedencia']);
$general->setDireccion($propiedadesGeneral['direccion']);
$general->setBarrio($propiedadesGeneral['barrio']);
$general->setTelefono($propiedadesGeneral['telefono']);
$general->setDireccionCali($propiedadesGeneral['direccioncali']);
$general->setBarrioCali($propiedadesGeneral['barriocali']);
$general->setTelefonoCali($propiedadesGeneral['telefonocali']);
$general->setResidencia($propiedadesGeneral['residencia']);
$general->setTrabaja($propiedadesGeneral['trabaja']);
$general->setCargoTrabajador($propiedadesGeneral['cargotrabajador']);
$general->setNombreEmpresa($propiedadesGeneral['nombreempresa']);
$general->setAntiguedad($propiedadesGeneral['antiguedad']);
$general->setCiudadEmpresa($propiedadesGeneral['ciudadempresa']);
$general->setDireccionEmpresa($propiedadesGeneral['direccionempresa']);
$general->setValorTotalIngreso($propiedadesGeneral['valortotalingreso']);
$general->setTelefonoTrabaja($propiedadesGeneral['valortotalingreso']);

$general->setFechaRegistro(new \DateTime('now'));
$general->setTelefonoTrabaja($propiedadesGeneral['telefonotrabajo']);

$general->setObservacion($propiedadesGeneral['observacion']);



$entityManager->persist($general);
$entityManager->flush();


//PARENTESCO papa
if($propiedadesGeneral['nombrepariente']!= NULL){
$tipoparentesco =  $entityManager->find('TipoParentesco', $propiedadesGeneral['tipoparentesco']);

$parentesco = new Parentesco();
$parentesco->setInformacionParentesco($general);
$parentesco->setTipoParentesco($tipoparentesco);
$parentesco->setNombre($propiedadesGeneral['nombrepariente']);
$parentesco->setEdad($propiedadesGeneral['edad']);
$parentesco->setDireccion($propiedadesGeneral['direccionpariente']);
$parentesco->setCiudad($propiedadesGeneral['ciudad']);
$parentesco->setOcupacion($propiedadesGeneral['ocupacion']);
$parentesco->setIngresos($propiedadesGeneral['ingresos']);

$entityManager->persist($parentesco);
$entityManager->flush();
}

//madre
if($propiedadesGeneral['nombrepariente2']!= NULL){
$tipoparentesco2 =  $entityManager->find('TipoParentesco', $propiedadesGeneral['tipoparentesco2']);

$parentesco2 = new Parentesco();
$parentesco2->setInformacionParentesco($general);
$parentesco2->setTipoParentesco($tipoparentesco2);
$parentesco2->setNombre($propiedadesGeneral['nombrepariente2']);
$parentesco2->setEdad($propiedadesGeneral['edad2']);
$parentesco2->setDireccion($propiedadesGeneral['direccionpariente2']);
$parentesco2->setCiudad($propiedadesGeneral['ciudad2']);
$parentesco2->setOcupacion($propiedadesGeneral['ocupacion2']);
$parentesco2->setIngresos($propiedadesGeneral['ingresos2']);

$entityManager->persist($parentesco2);
$entityManager->flush();
}
//conyuge
if($propiedadesGeneral['nombrepariente3']!= NULL){
$tipoparentesco3 =  $entityManager->find('TipoParentesco', $propiedadesGeneral['tipoparentesco3']);

$parentesco3 = new Parentesco();
$parentesco3->setInformacionParentesco($general);
$parentesco3->setTipoParentesco($tipoparentesco3);
$parentesco3->setNombre($propiedadesGeneral['nombrepariente3']);
$parentesco3->setEdad($propiedadesGeneral['edad3']);
$parentesco3->setDireccion($propiedadesGeneral['direccionpariente3']);
$parentesco3->setCiudad($propiedadesGeneral['ciudad3']);
$parentesco3->setOcupacion($propiedadesGeneral['ocupacion3']);
$parentesco3->setIngresos($propiedadesGeneral['ingresos3']);

$entityManager->persist($parentesco3);
$entityManager->flush();
}
//hermano 1
if($propiedadesGeneral['nombrepariente4']!= NULL){
$tipoparentesco4 =  $entityManager->find('TipoParentesco', $propiedadesGeneral['tipoparentesco4']);

$parentesco4 = new Parentesco();
$parentesco4->setInformacionParentesco($general);
$parentesco4->setTipoParentesco($tipoparentesco4);
$parentesco4->setNombre($propiedadesGeneral['nombrepariente4']);
$parentesco4->setEdad($propiedadesGeneral['edad4']);
$parentesco4->setDireccion($propiedadesGeneral['direccionpariente4']);
$parentesco4->setCiudad($propiedadesGeneral['ciudad4']);
$parentesco4->setOcupacion($propiedadesGeneral['ocupacion4']);
$parentesco4->setIngresos($propiedadesGeneral['ingresos4']);

$entityManager->persist($parentesco4);
$entityManager->flush();
}

//hermano 2
if($propiedadesGeneral['nombrepariente5']!= NULL){
$tipoparentesco5 =  $entityManager->find('TipoParentesco', $propiedadesGeneral['tipoparentesco5']);

$parentesco5 = new Parentesco();
$parentesco5->setInformacionParentesco($general);
$parentesco5->setTipoParentesco($tipoparentesco5);
$parentesco5->setNombre($propiedadesGeneral['nombrepariente5']);
$parentesco5->setEdad($propiedadesGeneral['edad5']);
$parentesco5->setDireccion($propiedadesGeneral['direccionpariente5']);
$parentesco5->setCiudad($propiedadesGeneral['ciudad5']);
$parentesco5->setOcupacion($propiedadesGeneral['ocupacion5']);
$parentesco5->setIngresos($propiedadesGeneral['ingresos5']);

$entityManager->persist($parentesco5);
$entityManager->flush();
}
//hermano 3

if($propiedadesGeneral['nombrepariente6']!= NULL){
$tipoparentesco6 =  $entityManager->find('TipoParentesco', $propiedadesGeneral['tipoparentesco6']);

$parentesco6 = new Parentesco();
$parentesco6->setInformacionParentesco($general);
$parentesco6->setTipoParentesco($tipoparentesco6);
$parentesco6->setNombre($propiedadesGeneral['nombrepariente6']);
$parentesco6->setEdad($propiedadesGeneral['edad6']);
$parentesco6->setDireccion($propiedadesGeneral['direccionpariente6']);
$parentesco6->setCiudad($propiedadesGeneral['ciudad6']);
$parentesco6->setOcupacion($propiedadesGeneral['ocupacion6']);
$parentesco6->setIngresos($propiedadesGeneral['ingresos6']);

$entityManager->persist($parentesco6);
$entityManager->flush();
}

//otro1

if($propiedadesGeneral['nombrepariente7']!= NULL){
$tipoparentesco7 =  $entityManager->find('TipoParentesco', $propiedadesGeneral['tipoparentesco7']);

$parentesco7 = new Parentesco();
$parentesco7->setInformacionParentesco($general);
$parentesco7->setTipoParentesco($tipoparentesco7);
$parentesco7->setNombre($propiedadesGeneral['nombrepariente7']);
$parentesco7->setEdad($propiedadesGeneral['edad7']);
$parentesco7->setDireccion($propiedadesGeneral['direccionpariente7']);
$parentesco7->setCiudad($propiedadesGeneral['ciudad7']);
$parentesco7->setOcupacion($propiedadesGeneral['ocupacion7']);
$parentesco7->setIngresos($propiedadesGeneral['ingresos7']);

$entityManager->persist($parentesco7);
$entityManager->flush();
}


//otro 2

if($propiedadesGeneral['nombrepariente8']!= NULL){
$tipoparentesco8 =  $entityManager->find('TipoParentesco', $propiedadesGeneral['tipoparentesco8']);

$parentesco8 = new Parentesco();
$parentesco8->setInformacionParentesco($general);
$parentesco8->setTipoParentesco($tipoparentesco8);
$parentesco8->setNombre($propiedadesGeneral['nombrepariente8']);
$parentesco8->setEdad($propiedadesGeneral['edad8']);
$parentesco8->setDireccion($propiedadesGeneral['direccionpariente8']);
$parentesco8->setCiudad($propiedadesGeneral['ciudad8']);
$parentesco8->setOcupacion($propiedadesGeneral['ocupacion8']);
$parentesco8->setIngresos($propiedadesGeneral['ingresos8']);

$entityManager->persist($parentesco8);
$entityManager->flush();
}
//parentesco 1

if($propiedadesGeneral['nombrepariente9']!= NULL){
$tipoparentesco9 =  $entityManager->find('TipoParentesco', $propiedadesGeneral['tipoparentesco9']);

$parentesco9 = new Parentesco();
$parentesco9->setInformacionParentesco($general);
$parentesco9->setTipoParentesco($tipoparentesco9);
$parentesco9->setNombre($propiedadesGeneral['nombrepariente9']);
$parentesco9->setEdad($propiedadesGeneral['edad9']);
$parentesco9->setDireccion($propiedadesGeneral['direccionpariente9']);
$parentesco9->setCiudad($propiedadesGeneral['ciudad9']);
$parentesco9->setOcupacion($propiedadesGeneral['ocupacion9']);
$parentesco9->setIngresos($propiedadesGeneral['ingresos9']);

$entityManager->persist($parentesco9);
$entityManager->flush();
}

//parentesco 2

if($propiedadesGeneral['nombrepariente10']!= NULL){
$tipoparentesco10 =  $entityManager->find('TipoParentesco', $propiedadesGeneral['tipoparentesco10']);

$parentesco10 = new Parentesco();
$parentesco10->setInformacionParentesco($general);
$parentesco10->setTipoParentesco($tipoparentesco10);
$parentesco10->setNombre($propiedadesGeneral['nombrepariente10']);
$parentesco10->setEdad($propiedadesGeneral['edad10']);
$parentesco10->setDireccion($propiedadesGeneral['direccionpariente10']);
$parentesco10->setCiudad($propiedadesGeneral['ciudad10']);
$parentesco10->setOcupacion($propiedadesGeneral['ocupacion10']);
$parentesco10->setIngresos($propiedadesGeneral['ingresos10']);

$entityManager->persist($parentesco10);
$entityManager->flush();
}




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
$tiponecesidad =  $entityManager->find('TipoNecesidad', $propiedadesGeneral['tiponecesidad']);
$fuente = new FuenteIngreso();
$fuente->setInformacionFuente($general);
$fuente->setTipoNecesidad($tiponecesidad);
$fuente->setNombre($propiedadesGeneral['nombre']);

$entityManager->persist($fuente);
$entityManager->flush();


$tiponecesidad2 =  $entityManager->find('TipoNecesidad', $propiedadesGeneral['tiponecesidad2']);
$fuente = new FuenteIngreso();
$fuente->setInformacionFuente($general);
$fuente->setTipoNecesidad($tiponecesidad2);
$fuente->setNombre($propiedadesGeneral['nombre2']);

$entityManager->persist($fuente);
$entityManager->flush();

$tiponecesidad3 =  $entityManager->find('TipoNecesidad', $propiedadesGeneral['tiponecesidad3']);
$fuente = new FuenteIngreso();
$fuente->setInformacionFuente($general);
$fuente->setTipoNecesidad($tiponecesidad3);
$fuente->setNombre($propiedadesGeneral['nombre3']);

$entityManager->persist($fuente);
$entityManager->flush();

$tiponecesidad4 =  $entityManager->find('TipoNecesidad', $propiedadesGeneral['tiponecesidad4']);
$fuente = new FuenteIngreso();
$fuente->setInformacionFuente($general);
$fuente->setTipoNecesidad($tiponecesidad4);
$fuente->setNombre($propiedadesGeneral['nombre4']);

$entityManager->persist($fuente);
$entityManager->flush();

$tiponecesidad5 =  $entityManager->find('TipoNecesidad', $propiedadesGeneral['tiponecesidad5']);
$fuente = new FuenteIngreso();
$fuente->setInformacionFuente($general);
$fuente->setTipoNecesidad($tiponecesidad5);
$fuente->setNombre($propiedadesGeneral['nombre5']);

$entityManager->persist($fuente);
$entityManager->flush();
//Bachillerato
$bachiller = new Bachillerato();
$bachiller->setInformacionBachiller($general);
$bachiller->setColegio($propiedadesGeneral['colegio']);
$bachiller->setMunicipio($propiedadesGeneral['municipio']);
$bachiller->setAñoGrado($propiedadesGeneral['añogrado']);
$bachiller->setPais($propiedadesGeneral['pais']);
$bachiller->setBachillerIcfes($propiedadesGeneral['bachillericfes']);
$bachiller->setAñoIcfes($propiedadesGeneral['añoicfes']);
$bachiller->setCaracterColegio($propiedadesGeneral['caractercolegio']);
$bachiller->setValorMatricula($propiedadesGeneral['valormatricula']);
$bachiller->setValorPension($propiedadesGeneral['valorpension']);

$entityManager->persist($bachiller);
$entityManager->flush();

//InformacionFamiliar
$familiar = new InformacionFamiliar();
$familiar->setInformaciongeneral($general);
$familiar->setCasaPropia($propiedadesGeneral['casapropia']);
$familiar->setHipoteca($propiedadesGeneral['hipoteca']);
$familiar->setValorMensualAmortizacion($propiedadesGeneral['valormensualamortizacion']);
$familiar->setMensualArriendo($propiedadesGeneral['valormensualarriendo']);
$familiar->setJefeFamilia($propiedadesGeneral['jefefamilia']);
$familiar->setNivelEducativoJefe($propiedadesGeneral['niveleducativojefe']);
$familiar->setIngresoMensualFamiliar($propiedadesGeneral['ingresomensualfamiliar']);
$familiar->setPosicionJefe($propiedadesGeneral['posicionjefe']);
$familiar->setEmpresaJefe($propiedadesGeneral['empresajefe']);
$familiar->setOcupacionJefe($propiedadesGeneral['ocupacionjefe']);
$familiar->setIngresoJefe($propiedadesGeneral['ingresojefe']);
$familiar->setDireccionEmpresaJefe($propiedadesGeneral['direccionempresajefe']);
$familiar->setCiudad($propiedadesGeneral['ciudadjefe']);
$familiar->setTelefono($propiedadesGeneral['telefonojefe']);

$entityManager->persist($familiar);
$entityManager->flush();