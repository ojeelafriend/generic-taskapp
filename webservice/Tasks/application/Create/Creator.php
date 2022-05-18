<?php
    //require_once('./infrastructure/MySQLConnection.php');
    //$client = connect("localhost","root", "", "taskdb");
    
    require_once('./Checker.php');
    require_once('../../domain/Task.php');
    
    class Creator{
        private $repository;
        private $checker;

        public function __construct(\IRepository $repository){
            $this->repository = $repository;
            $this->checker = new Checker();
        }

        public function run($title, $text, $tag){
            try {
                $this->checker->verify($title, $text, $tag);
                $wrapper = $this->checker->convert($title, $text, $tag);

                $task = new Task($wrapper['title'], $wrapper['text'], $wrapper['tag']);
                $this->repository->create($task);
            } catch (Exception $e) {
                //! crear varias excepciones
                echo implode("\n", $this->checker->showErrors());
            }

        }
    }
    


?>