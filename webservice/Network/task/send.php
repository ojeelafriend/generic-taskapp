<?php

    require_once("../../Tasks/application/Create/Creator.php");
    require_once("../../Tasks/infrastructure/MySQLRepository.php");

    $repository = new MySQLRepository();
    $creator = new Creator($repository);

    $title= $_POST['title'];
    $text= $_POST['text'];
    $tag= $_POST['tag'];

    try{
        $creator->run($title, $text, $tag);
        header('Content-Type: application/json');
        echo json_encode("Task saved successfully");
    }catch(FieldException $fieldError) {
        echo json_encode("There is a problem with the requested fields: " . $fieldError->getMessage());
    }catch(Exception $e){
        echo json_encode("Unexpected error: " . $e->getMessage());
    }

?>