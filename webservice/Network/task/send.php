<?php
    require_once("../response.php");

    require_once("../../Tasks/application/Create/Creator.php");
    require_once("../../Tasks/infrastructure/MySQLRepository.php");

    $repository = new MySQLRepository();
    $creator = new Creator($repository);

    $title= $_POST['title'];
    $text= $_POST['text'];
    $tag= $_POST['tag'];

    try{
        $creator->run($title, $text, $tag);
        echo "Yeah, create data";
    }catch(Exception $e){
        echo "Error papa";
        echo implode("//", $creator->showErrors());
        echo $e;
        //?trabajar varios catchs y sus respectivas excepciones
    }
    


?>