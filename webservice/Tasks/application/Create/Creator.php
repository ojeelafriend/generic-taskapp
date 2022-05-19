<?php
    //require_once('./infrastructure/MySQLConnection.php');
    //$client = connect("localhost","root", "", "taskdb");
    require_once(__DIR__."/../../domain/Task.php");
    require_once(__DIR__ . "/Checker.php");

    class Creator extends Checker {
        private $repository;

        public function __construct(\IRepository $repository){
            $this->repository = $repository;
        }

        public function run($title, $text, $tag){
            $this->verify($title, $text, $tag);
            
            $wrapper = $this->convert($title, $text, $tag);

            $task = new Task($wrapper['title'], $wrapper['text'], $wrapper['tag']);
            $this->repository->save($task);
        }

    }

?>