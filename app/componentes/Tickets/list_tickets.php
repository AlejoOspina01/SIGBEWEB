<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


 require_once "../../../bootstrap.php";

 $identificacion=$_GET["identificacion"];

 $tickets =$entityManager->createQuery('select u from tickets u where u = u')
->getResult();

if ($tickets === null) {
    echo "No usuario found.\n";
    exit(1);
}


for($i=0; $i< sizeof($tickets); $i++){
      

	if($tickets[$i]->getUsuario()->getIdentifacion() == $identificacion){
      $arraytickets[] =  array(
      	              'consecutivoticket' =>  $tickets[$i]->getConsecutivoTicket(),
                      'fecha_compra' => $tickets[$i]-> getFechaCompra(), 
                      'identificacion_estudiante' => $tickets[$i]->getUsuario()->getIdentifacion(),
                      'codigo_estudiante' =>$tickets[$i]->getUsuario()->getCodigoEst(),
                      'nombre_estudiate' =>  $tickets[$i]->getUsuario()->getNombre(),
                      'apellido_estudiate' =>  $tickets[$i]->getUsuario()->getApellido(),


                      
                        
                    );
}
}




echo json_encode($arraytickets);

header('Content-Type: application/json');