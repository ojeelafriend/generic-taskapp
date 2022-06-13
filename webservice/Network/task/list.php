<?php
require_once(__DIR__ . '../../../Tasks/infrastructure/MySQLRepository.php');
require_once(__DIR__ . '../../../Tasks/application/exceptions/ListException.php');
require_once(__DIR__ . '../../../Tasks/application/Lister.php');

$repository = new MySQLRepository();
$lister = new Lister($repository);

try {
    $initial = $_POST['initial'];
    $items = $_POST['items'];

    $tasks = $lister->run($initial, $items);

    echo json_encode($tasks);
} catch (ListException $e) {
    echo json_encode(false);
} catch (PDOException $e) {
    echo json_encode(false);
} catch (Exception $e) {
    echo json_encode(false);
}
