<?php

use Doctrine\ORM\Mapping\OrderBy;

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

date_default_timezone_set("America/Bogota");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../../bootstrap.php";

$opcion = $_GET["idperiodosel"];
$resultadosinforme= array();

$arrayfrecuencia= array();
$arraycalidad= array();
$arraycantidad= array();
$arrayvariedad= array();
$arrayhorario= array();
$arrayespacio= array();
$arraycalificacionservicio= array();
$arrayComentarios= array();

if($opcion == 0){

//PREGUNTA FRECUENCIA

$cantencuestafrecuencia = $entityManager->createQuery("SELECT COUNT(e.frecuencia) FROM Encuesta e WHERE e.frecuencia =  ?1")
->setParameter(1,0);
$resultencuesta= $cantencuestafrecuencia->getSingleResult();

array_push($arrayfrecuencia,$resultencuesta[1]);

$cantencuestafrecuencia = $entityManager->createQuery("SELECT COUNT(e.frecuencia) FROM Encuesta e WHERE e.frecuencia =  ?1")
->setParameter(1,1);
$resultencuesta= $cantencuestafrecuencia->getSingleResult();
array_push($arrayfrecuencia,$resultencuesta[1]);
$cantencuestafrecuencia = $entityManager->createQuery("SELECT COUNT(e.frecuencia) FROM Encuesta e WHERE e.frecuencia =  ?1")
->setParameter(1,2);
$resultencuesta= $cantencuestafrecuencia->getSingleResult();
array_push($arrayfrecuencia,$resultencuesta[1]);

//SE INSERTA LOS RESULTADOS
array_push($resultadosinforme,$arrayfrecuencia);


//PREGUNTA CALIDAD

$cantencuestacalidad = $entityManager->createQuery("SELECT COUNT(e.calidad) FROM Encuesta e WHERE e.calidad =  ?1")
->setParameter(1,0);
$resultencuesta= $cantencuestacalidad->getSingleResult();

array_push($arraycalidad,$resultencuesta[1]);

$cantencuestacalidad = $entityManager->createQuery("SELECT COUNT(e.calidad) FROM Encuesta e WHERE e.calidad =  ?1")
->setParameter(1,1);

$resultencuesta= $cantencuestacalidad->getSingleResult();
array_push($arraycalidad,$resultencuesta[1]);

$cantencuestacalidad = $entityManager->createQuery("SELECT COUNT(e.calidad) FROM Encuesta e WHERE e.calidad =  ?1")
->setParameter(1,2);

$resultencuesta= $cantencuestacalidad->getSingleResult();
array_push($arraycalidad,$resultencuesta[1]);

$cantencuestacalidad = $entityManager->createQuery("SELECT COUNT(e.calidad) FROM Encuesta e WHERE e.calidad =  ?1")
->setParameter(1,3);

$resultencuesta= $cantencuestacalidad->getSingleResult();
array_push($arraycalidad,$resultencuesta[1]);

//SE INSERTA EL RESULTADO
array_push($resultadosinforme,$arraycalidad);

//PREGUNTA CANTIDAD
$cantencuestacantidad = $entityManager->createQuery("SELECT COUNT(e.cantidad) FROM Encuesta e WHERE e.cantidad =  ?1")
->setParameter(1,0);
$resultencuesta= $cantencuestacantidad->getSingleResult();

array_push($arraycantidad,$resultencuesta[1]);

$cantencuestacantidad = $entityManager->createQuery("SELECT COUNT(e.cantidad) FROM Encuesta e WHERE e.cantidad =  ?1")
->setParameter(1,1);
$resultencuesta= $cantencuestacantidad->getSingleResult();
array_push($arraycantidad,$resultencuesta[1]);
$cantencuestacantidad = $entityManager->createQuery("SELECT COUNT(e.cantidad) FROM Encuesta e WHERE e.cantidad =  ?1")
->setParameter(1,2);
$resultencuesta= $cantencuestacantidad->getSingleResult();
array_push($arraycantidad,$resultencuesta[1]);

//SE INSERTA LOS RESULTADOS
array_push($resultadosinforme,$arraycantidad);


//PREGUNTA VARIEDAD
$cantencuestavariedad = $entityManager->createQuery("SELECT COUNT(e.variedad) FROM Encuesta e WHERE e.variedad =  ?1")
->setParameter(1,0);
$resultencuesta= $cantencuestavariedad->getSingleResult();

array_push($arrayvariedad,$resultencuesta[1]);

$cantencuestavariedad = $entityManager->createQuery("SELECT COUNT(e.variedad) FROM Encuesta e WHERE e.variedad =  ?1")
->setParameter(1,1);
$resultencuesta= $cantencuestavariedad->getSingleResult();
array_push($arrayvariedad,$resultencuesta[1]);
$cantencuestavariedad = $entityManager->createQuery("SELECT COUNT(e.variedad) FROM Encuesta e WHERE e.variedad =  ?1")
->setParameter(1,2);
$resultencuesta= $cantencuestavariedad->getSingleResult();
array_push($arrayvariedad,$resultencuesta[1]);

//SE INSERTA LOS RESULTADOS
array_push($resultadosinforme,$arrayvariedad);

//PREGUNTA HORARIO

$cantencuestahorario = $entityManager->createQuery("SELECT COUNT(e.horario) FROM Encuesta e WHERE e.horario =  ?1")
->setParameter(1,0);
$resultencuesta= $cantencuestahorario->getSingleResult();

array_push($arrayhorario,$resultencuesta[1]);

$cantencuestahorario = $entityManager->createQuery("SELECT COUNT(e.horario) FROM Encuesta e WHERE e.horario =  ?1")
->setParameter(1,1);
$resultencuesta= $cantencuestahorario->getSingleResult();
array_push($arrayhorario,$resultencuesta[1]);

//SE INSERTA LOS RESULTADOS
array_push($resultadosinforme,$arrayhorario);

//PREGUNTA ESPACIO
$cantencuestaespacio = $entityManager->createQuery("SELECT COUNT(e.espacio) FROM Encuesta e WHERE e.espacio =  ?1")
->setParameter(1,0);
$resultencuesta= $cantencuestaespacio->getSingleResult();

array_push($arrayespacio,$resultencuesta[1]);

$cantencuestaespacio = $entityManager->createQuery("SELECT COUNT(e.espacio) FROM Encuesta e WHERE e.espacio =  ?1")
->setParameter(1,1);
$resultencuesta= $cantencuestaespacio->getSingleResult();
array_push($arrayespacio,$resultencuesta[1]);

//SE INSERTA LOS RESULTADOS
array_push($resultadosinforme,$arrayespacio);

//PREGUNTA CALIFICACION
$cantencuestacalificacion = $entityManager->createQuery("SELECT COUNT(e.calificacionservicio) FROM Encuesta e WHERE e.calificacionservicio =  ?1")
->setParameter(1,0);
$resultencuesta= $cantencuestacalificacion->getSingleResult();

array_push($arraycalificacionservicio,$resultencuesta[1]);

$cantencuestacalificacion = $entityManager->createQuery("SELECT COUNT(e.calificacionservicio) FROM Encuesta e WHERE e.calificacionservicio =  ?1")
->setParameter(1,1);

$resultencuesta= $cantencuestacalificacion->getSingleResult();
array_push($arraycalificacionservicio,$resultencuesta[1]);

$cantencuestacalificacion = $entityManager->createQuery("SELECT COUNT(e.calificacionservicio) FROM Encuesta e WHERE e.calificacionservicio =  ?1")
->setParameter(1,2);

$resultencuesta= $cantencuestacalificacion->getSingleResult();
array_push($arraycalificacionservicio,$resultencuesta[1]);

$cantencuestacalificacion = $entityManager->createQuery("SELECT COUNT(e.calificacionservicio) FROM Encuesta e WHERE e.calificacionservicio =  ?1")
->setParameter(1,3);

$resultencuesta= $cantencuestacalificacion->getSingleResult();
array_push($arraycalificacionservicio,$resultencuesta[1]);

//SE INSERTA EL RESULTADO
array_push($resultadosinforme,$arraycalificacionservicio);

echo json_encode($resultadosinforme);
}else{

//PREGUNTA FRECUENCIA

$cantencuestafrecuencia = $entityManager->createQuery("SELECT COUNT(e.frecuencia) FROM Encuesta e WHERE e.frecuencia =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,0)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestafrecuencia->getSingleResult();

array_push($arrayfrecuencia,$resultencuesta[1]);

$cantencuestafrecuencia = $entityManager->createQuery("SELECT COUNT(e.frecuencia) FROM Encuesta e WHERE e.frecuencia =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,1)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestafrecuencia->getSingleResult();
array_push($arrayfrecuencia,$resultencuesta[1]);
$cantencuestafrecuencia = $entityManager->createQuery("SELECT COUNT(e.frecuencia) FROM Encuesta e WHERE e.frecuencia =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,2)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestafrecuencia->getSingleResult();
array_push($arrayfrecuencia,$resultencuesta[1]);

//SE INSERTA LOS RESULTADOS
array_push($resultadosinforme,$arrayfrecuencia);


//PREGUNTA CALIDAD

$cantencuestacalidad = $entityManager->createQuery("SELECT COUNT(e.calidad) FROM Encuesta e WHERE e.calidad =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,0)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestacalidad->getSingleResult();

array_push($arraycalidad,$resultencuesta[1]);

$cantencuestacalidad = $entityManager->createQuery("SELECT COUNT(e.calidad) FROM Encuesta e WHERE e.calidad =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,1)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestacalidad->getSingleResult();
array_push($arraycalidad,$resultencuesta[1]);

$cantencuestacalidad = $entityManager->createQuery("SELECT COUNT(e.calidad) FROM Encuesta e WHERE e.calidad =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,2)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestacalidad->getSingleResult();
array_push($arraycalidad,$resultencuesta[1]);

$cantencuestacalidad = $entityManager->createQuery("SELECT COUNT(e.calidad) FROM Encuesta e WHERE e.calidad =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,3)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestacalidad->getSingleResult();
array_push($arraycalidad,$resultencuesta[1]);

//SE INSERTA EL RESULTADO
array_push($resultadosinforme,$arraycalidad);

//PREGUNTA CANTIDAD
$cantencuestacantidad = $entityManager->createQuery("SELECT COUNT(e.cantidad) FROM Encuesta e WHERE e.cantidad =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,0)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestacantidad->getSingleResult();

array_push($arraycantidad,$resultencuesta[1]);

$cantencuestacantidad = $entityManager->createQuery("SELECT COUNT(e.cantidad) FROM Encuesta e WHERE e.cantidad =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,1)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestacantidad->getSingleResult();
array_push($arraycantidad,$resultencuesta[1]);
$cantencuestacantidad = $entityManager->createQuery("SELECT COUNT(e.cantidad) FROM Encuesta e WHERE e.cantidad =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,2)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestacantidad->getSingleResult();
array_push($arraycantidad,$resultencuesta[1]);

//SE INSERTA LOS RESULTADOS
array_push($resultadosinforme,$arraycantidad);


//PREGUNTA VARIEDAD
$cantencuestavariedad = $entityManager->createQuery("SELECT COUNT(e.variedad) FROM Encuesta e WHERE e.variedad =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,0)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestavariedad->getSingleResult();

array_push($arrayvariedad,$resultencuesta[1]);

$cantencuestavariedad = $entityManager->createQuery("SELECT COUNT(e.variedad) FROM Encuesta e WHERE e.variedad =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,1)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestavariedad->getSingleResult();
array_push($arrayvariedad,$resultencuesta[1]);
$cantencuestavariedad = $entityManager->createQuery("SELECT COUNT(e.variedad) FROM Encuesta e WHERE e.variedad =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,2)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestavariedad->getSingleResult();
array_push($arrayvariedad,$resultencuesta[1]);

//SE INSERTA LOS RESULTADOS
array_push($resultadosinforme,$arrayvariedad);

//PREGUNTA HORARIO

$cantencuestahorario = $entityManager->createQuery("SELECT COUNT(e.horario) FROM Encuesta e WHERE e.horario =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,0)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestahorario->getSingleResult();

array_push($arrayhorario,$resultencuesta[1]);

$cantencuestahorario = $entityManager->createQuery("SELECT COUNT(e.horario) FROM Encuesta e WHERE e.horario =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,1)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestahorario->getSingleResult();
array_push($arrayhorario,$resultencuesta[1]);

//SE INSERTA LOS RESULTADOS
array_push($resultadosinforme,$arrayhorario);

//PREGUNTA ESPACIO
$cantencuestaespacio = $entityManager->createQuery("SELECT COUNT(e.espacio) FROM Encuesta e WHERE e.espacio =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,0)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestaespacio->getSingleResult();

array_push($arrayespacio,$resultencuesta[1]);

$cantencuestaespacio = $entityManager->createQuery("SELECT COUNT(e.espacio) FROM Encuesta e WHERE e.espacio =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,1)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestaespacio->getSingleResult();
array_push($arrayespacio,$resultencuesta[1]);

//SE INSERTA LOS RESULTADOS
array_push($resultadosinforme,$arrayespacio);

//PREGUNTA CALIFICACION
$cantencuestacalificacion = $entityManager->createQuery("SELECT COUNT(e.calificacionservicio) FROM Encuesta e WHERE e.calificacionservicio =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,0)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestacalificacion->getSingleResult();

array_push($arraycalificacionservicio,$resultencuesta[1]);

$cantencuestacalificacion = $entityManager->createQuery("SELECT COUNT(e.calificacionservicio) FROM Encuesta e WHERE e.calificacionservicio =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,1)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestacalificacion->getSingleResult();
array_push($arraycalificacionservicio,$resultencuesta[1]);

$cantencuestacalificacion = $entityManager->createQuery("SELECT COUNT(e.calificacionservicio) FROM Encuesta e WHERE e.calificacionservicio =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,2)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestacalificacion->getSingleResult();
array_push($arraycalificacionservicio,$resultencuesta[1]);

$cantencuestacalificacion = $entityManager->createQuery("SELECT COUNT(e.calificacionservicio) FROM Encuesta e WHERE e.calificacionservicio =  ?1 AND e.periodoacademico = ?2")
->setParameter(1,3)
->setParameter(2,$opcion);
$resultencuesta= $cantencuestacalificacion->getSingleResult();
array_push($arraycalificacionservicio,$resultencuesta[1]);

//SE INSERTA EL RESULTADO
array_push($resultadosinforme,$arraycalificacionservicio);
echo json_encode($resultadosinforme);
}

