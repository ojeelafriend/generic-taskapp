<?php
    require_once('./MySQLConnection.php');

    class MySQLRepository implements IRepository{
        //!warn: use .env
        private $hostname="localhost";
        private $username="root";
        private $password="";
        private $database="taskapp";

        private $client;
        
        public function __construct(){
            $this->client = connect($this->hostname, $this->username, $this->password, $this->database);
        }

        public function create(\Task $task){
            $wrapper = $task->showDetails();

            //query...
        }
    }


?>