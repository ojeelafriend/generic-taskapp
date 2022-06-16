<?php
require_once('./infrastructure/MySQLRepository.php');
require_once('./application/exceptions/ListException.php');
require_once('./application/Lister.php');
require_once('./domain/Task.php');

$mysql = new MySQLRepository();
$lister = new Lister($mysql);

try {
    $initial = $lister->run(0, 5);
    echo json_encode($initial);
} catch (ListException $th) {

    echo json_encode($th->getMessage());
}
