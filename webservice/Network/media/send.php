<?php
require_once(__DIR__ . '../../../Users/application/Media/Guider.php');
require_once(__DIR__ . '../../../Users/infrastructure/MySQLMediaRepository.php');

$repository = new MySQLMediaRepository();
$guider = new Guider($repository);

$name = $_FILE['name'];
$size = $_FILE['size'];
$tmp_file = $_FILE['tmp_file'];

try {
    $guider->run($name, $tmp_file, $size);
    echo json_encode(true);
} catch (\Exception $err) {
    echo json_encode(false);
}
