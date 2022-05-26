<?php
    require_once(__DIR__ . '../../../Tasks/application/List/Lister.php');
    require_once(__DIR__ . '../../../Tasks/infrastructure/MySQLRepository.php');

    $repository = new MySQLRepository();
    $lister = new Lister($repository);

    try{
        $initial = $_POST['initial'];
        $items = $_POST['items'];
    
        $tasks = $lister->run($initial, $items);

        echo json_encode($tasks);
    }catch(ListException $e){
        echo json_encode($e->getMessage());

    }catch(PDOException $e){
        echo json_encode($e->getMessage());

    }catch(Exception $e){
        echo json_encode($e->getMessage());
    }

?>