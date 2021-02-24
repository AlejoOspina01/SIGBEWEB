<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once "../../../bootstrap.php";

$postulaciones = $entityManager->createQuery("
SELECT  u 
FROM Postulacion u  WHERE u.estado_postulacion  = 'En espera'  
"    
);


$postuactivas= $postulaciones-> getResult();

 

 $postulacionesActivas;


 for($i=0 ; $i< sizeof($postuactivas); $i++){

 $postulacionesActivas[$i]= array('nombre' => $postuactivas[$i]->getUsuario()->getNombre(),
 								  'consecutivo_postulacion' =>$postuactivas[$i]->getConsecutivo_postulacion(),
                                  'promedio' => $postuactivas[$i]->getPromedio(),
                                  'fechapostulacion' =>  $postuactivas[$i]->getFechapostulacion(),
                                  'semestre' => $postuactivas[$i]->getSemestre(),
                                  'estrato' =>  $postuactivas[$i]->getEstrato(),
                                  'convocatoria' =>  $postuactivas[$i]-> getConvocatoria()->getConsecutivoBeca()->getDescripcion(),
                                   'estado' => $postuactivas[$i]->getEstado_postulacion(),


);
 
 }

echo json_encode($postulacionesActivas);