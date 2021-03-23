<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once "../../../bootstrap.php";

$usuarios = $entityManager->createQuery("
SELECT * 
FROM usuarios u
ORDER BY u.identificacion DESC
LIMIT 5 
"    
);

//$ultuimosusuarios





