<?php

require_once(__DIR__ . '../../../Tasks/infrastructure/MySQLRepository.php');
require_once(__DIR__ . '../../../Tasks/application/Lister.php');


$repository = new MySQLRepository();
$lister = new Lister($repository);

try {
    $rows = $lister->countItems();
    echo json_encode($rows);
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
