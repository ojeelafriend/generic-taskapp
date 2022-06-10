<?php
    require_once('./infrastructure/MySQLRepository.php');
    require_once('./domain/Task.php');

    $mysql = new MySQLRepository();

    $rows = $mysql->read(1, 5);

?>