<?php

require_once(__DIR__ . '../../../Users/infrastructure/MySQLUserRepository.php');
require_once(__DIR__ . '../../../Users/application/Editor.php');


$repository = new MySQLUserRepository();

$editor = new Editor($repository);

$description = $_POST['description'];

try {
    $editor->run($description);
    echo json_encode(true);
} catch (\Throwable $th) {
    echo json_encode($th);
}
