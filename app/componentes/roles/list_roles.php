<?php
// list_roles.php
require_once "../../../bootstrap.php";


$rolRepository = $entityManager->getRepository('Roles')
->createQueryBuilder('c')
->select('c')
->getQuery()
->getArrayResult();

echo json_encode($rolRepository);

// foreach ($roles as $rol) {
//     echo json_encode($rol);
// }