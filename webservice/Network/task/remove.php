<?php
    require_once(__DIR__ . '../../../Tasks/infrastructure/MySQLRepository.php');
    require_once(__DIR__ . '../../../Tasks/application/exceptions/ListException.php');
    require_once(__DIR__ . '../../../Tasks/application/Eliminator.php');

    $repository = new MySQLRepository();
    $eliminator = new Eliminator($repository);

    try {
        $taskId = $_POST['taskId'];
        $eliminator->run($taskId);
        
        echo json_encode('Task deleted with successfully');
    } catch (PDOException $error) {
        echo json_encode('Internal error');
    }
