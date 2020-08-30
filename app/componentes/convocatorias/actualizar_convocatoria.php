<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// show_roles.php <id>
require_once "../../../bootstrap.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$stdConvo = get_object_vars($request);
$propiedadesConvo = get_object_vars($stdConvo['data']);

//$estadoConvocatoria = $_GET["estadoconvocatoria"];
//$fechainicio = (new \DateTime('now', new DateTimeZone('America/Bogota')))->format('Y-m-d H:i:s');
//$newConsecutivoConvocatoria = $_GET["consecutivoconvocatoria"];

$convocatoriaUpdate = $entityManager->createQueryBuilder();
$query = $convocatoriaUpdate->update('Convocatorias', 'c') 
        ->set('c.cupo', '?1')
        ->set('c.becas', '?3')
        ->set('c.periodosacademicos', '?4')
        ->set('c.fecha_inicio', '?5')
        ->set('c.fecha_fin', '?6')
        ->set('c.estado_convocatoria', '?7')
        ->where('c.consecutivo_convocatoria = ?2')
        ->setParameter(1,$propiedadesConvo['cupo'] )
        ->setParameter(3,$propiedadesConvo['becas'] )
        ->setParameter(4,$propiedadesConvo['periodosacademicos'] )
        ->setParameter(5,$propiedadesConvo['fecha_inicio'] )
        ->setParameter(6,$propiedadesConvo['fecha_fin'] )
        ->setParameter(7,$propiedadesConvo['estado_convocatoria'] )
        ->setParameter(2,$propiedadesConvo['consecutivo_convocatoria'] )
        ->getQuery();
        $execute = $query->execute();

        //->set('c.fecha_inicio', '?3')
        //->set('u.correo', '?3')
        //->set('u.codigoestudiante', '?4')
        //->set('u.nombre', '?5')
        //->set('u.apellido', '?6')
        
        //->setParameter(2, $propiedadesSaldo['identificacion'])
        //->setParameter(3, $propiedadesSaldo['correo'])
        //->setParameter(4, $propiedadesSaldo['codigoestudiante'])
        //->setParameter(5, $propiedadesSaldo['nombre'])
        //->setParameter(6, $propiedadesSaldo['apellido'])
        

if ($convocatoriaUpdate === null) {
    echo "No usuario found.\n";
    echo "Fallo";    
    exit(1);
}
