<?php
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: PUT');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL);
ini_set("display_errors", 1);


$confdata = file_get_contents("php://input");
$request = json_decode($confdata);

$stdConf = get_object_vars($request);
$propConf = get_object_vars($stdConf['data']);
$variableCambiar = $propConf["variable"];
$valorNuevo = $propConf["valorNuevo"];
$textoArchivo = file("config.txt");
$variables= array();
// Mostrar el contenido del archivo:
for ($i=0; $i < sizeof($textoArchivo); $i++) { 
  array_push($variables, explode("|",$textoArchivo[$i]));
}

$variables[$variableCambiar][1] = $valorNuevo . "\n";
$variables[0]  = implode("|",$variables[0]);
$variables[1]  = implode("|",$variables[1]);
$variables[2]  = implode("|",$variables[2]);
$variables[3]  = implode("|",$variables[3]);
$variables[4]  = implode("|",$variables[4]);
$variables[5]  = implode("|",$variables[5]);
$variables[6]  = implode("|",$variables[6]);
$variables[7]  = implode("|",$variables[7]);

  // Abrir el archivo:
$archivo = fopen('config.txt', "w");
fwrite($archivo,'');
fclose($archivo);
$valor = $propConf["variable"];
$archivo2 = fopen('config.txt', "w");
for ($i=0; $i < sizeof($variables); $i++) { 
  if($i == $valor){
    fwrite($archivo2, $variables[$i]);
  }else{
    fwrite($archivo2, $variables[$i]);
  }
}  
fclose($archivo2);