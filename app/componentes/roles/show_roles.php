<?php
// show_roles.php <id>
require_once "../../../bootstrap.php";

$id = $argv[1];
$rol = $entityManager->find('Roles', $id);

if ($rol === null) {
    echo "No rol found.\n";
    exit(1);
}