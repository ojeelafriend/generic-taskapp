<?php
require_once(__DIR__ . '../../../Users/infrastructure/MySQLUserRepository.php');
require_once(__DIR__ . '../../../Users/infrastructure/MySQLMediaRepository.php');

require_once(__DIR__ . '../../../Users/application/Create/Maker.php');

$repository = new MySQLUserRepository();
$mediaRepository = new MySQLMediaRepository();

$maker = new Maker($repository, $mediaRepository);

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

try {
    $maker->run($email, $username, $password);
    echo json_encode("User saved successfully");
} catch (\FieldException $fieldError) {
    echo json_encode("There is a problem with the requested fields: " . $fieldError->getMessage());
} catch (Exception $err) {
    echo json_encode("Unexpected error: " . $err->getMessage());
}
