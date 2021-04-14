<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");
error_reporting(E_ALL);
ini_set("display_errors", 1);

$textoArchivo = file("config.txt");
$variables= array();
$horaactual = date("H:i");
// Mostrar el contenido del archivo:
for ($i=0; $i < sizeof($textoArchivo); $i++) { 
	array_push($variables, explode("|",$textoArchivo[$i]));
}

for ($i=0; $i < sizeof($variables); $i++) { 
	$variables[$i][1] = trim($variables[$i][1]);
}
$arrayResultante= array(
	"valorticketalmuerzo" => $variables[0][1],
	"valorticketrefrigerio" => $variables[1][1],
	"horainicioVentaAlmuerzo" => $variables[2][1],
	"horaFinVentaAlmuerzo" => $variables[3][1],
	"horainicioVentaRefrigerio" => $variables[4][1],
	"horaFinVentaRefrigerio" => $variables[5][1],
	"valorticketalmuerzobeneficiario" => $variables[6][1],
	"valorticketrefrigeriobeneficiario" => $variables[7][1],
	"correoestablecido" => $variables[8][1],
	"contrasenaestablecido" => $variables[9][1],
	"horaactualserver" =>$horaactual
);

echo json_encode($arrayResultante);
