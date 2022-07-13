<?php
require_once(__DIR__ . '../../../Tasks/infrastructure/MySQLRepository.php');
require_once(__DIR__ . '../../../Tasks/application/Searcher.php');

$repository = new MySQLRepository();
$searcher = new Searcher($repository);

$search = $_GET['search'];

try {
    $result = $searcher->run($search);
    echo json_encode($result);
} catch (Exception $err) {
    echo json_encode($err->getMessage());
}
