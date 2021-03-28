<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../../bootstrap.php";

$periodoencontrado = $entityManager->createQuery('SELECT u FROM Periodosacademicos u WHERE u.fecha_fin = (SELECT MAX(p.fecha_fin) from Periodosacademicos p)')
->getSingleResult();

if ($periodoencontrado === null) {
	echo "No asignacion found.\n";
	exit(1);
}

function compararFechas($primera, $segunda)
 {
  $valoresPrimera = explode ("/", $primera);   
  $valoresSegunda = explode ("/", $segunda); 

  $diaPrimera    = $valoresPrimera[0];  
  $mesPrimera  = $valoresPrimera[1];  
  $anyoPrimera   = $valoresPrimera[2]; 

  $diaSegunda   = $valoresSegunda[0];  
  $mesSegunda = $valoresSegunda[1];  
  $anyoSegunda  = $valoresSegunda[2];

  $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
  $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);     

  if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
    // "La fecha ".$primera." no es v&aacute;lida";
    return 0;
  }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
    // "La fecha ".$segunda." no es v&aacute;lida";
    return 0;
  }else{
    return  $diasPrimeraJuliano - $diasSegundaJuliano;
  } 

}
$primera = $periodoencontrado->getFechaFin()->format('d/m/Y');
$segunda = date('d/m/Y');

if(compararFechas ($primera,$segunda) <= 7){
	$convertfechainicial = true;
}else{
	$convertfechainicial = false;
}
$periodofound =  array(
	'consecutivo_periodo'     => $periodoencontrado->getConsecutivo_periodo(),
	'descripcion'         => $periodoencontrado->getDescripcion(),
	'fechainicial'    => $periodoencontrado->getFechaInicio(),
	'fechafinal'    => $periodoencontrado->getFechaFin(),
	'menossietedias' => $convertfechainicial
);

echo json_encode($periodofound);