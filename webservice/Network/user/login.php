<?php

require_once(__DIR__ . '../../../Users/infrastructure/MySQLUserRepository.php');
require_once(__DIR__ . '../../../Users/application/Initiator.php');

$repository = new MySQLUserRepository();
$initiator = new Initiator($repository);

$email = $_POST['email'];
$password = hash("sha256", $_POST['password']);

try {
    $initiator->run($email, $password);
    echo json_encode(true);
} catch (\Exception $err) {
    echo json_encode(false);
}
