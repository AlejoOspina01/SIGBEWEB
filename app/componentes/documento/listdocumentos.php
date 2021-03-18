<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once "../../../bootstrap.php";
/* include_once"../../../src/Periodos_academicos.php"; */

$documentos = $entityManager->createQuery('
	SELECT u FROM Documentos u  where u = u');

$docsfound=$documentos->getResult();

$docsarray;

for ($i=0; $i < sizeof($docsfound); $i++) { 
	$docsarray[$i] =  array(
    'iddocumento'  => $docsfound[$i]->getIdDocumento(),
    'descripcion'  => $docsfound[$i]->getDescripcion()
  );
}
if ($documentos === null) {
  echo "No convomipana found.\n";
  exit(1);
}

echo json_encode($docsarray);