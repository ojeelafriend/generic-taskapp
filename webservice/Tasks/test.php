<?php
require_once('./infrastructure/MySQLRepository.php');
require_once('./application/exceptions/ListException.php');
require_once('./application/Searcher.php');

$mysql = new MySQLRepository();
$searcher = new Searcher($mysql);

try {
    $result = $searcher->run("php");
    echo json_encode($result);
} catch (ListException $th) {

    echo json_encode($th->getMessage());
}
