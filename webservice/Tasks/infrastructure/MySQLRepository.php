<?php
    require_once(__DIR__ . '../../../Shared/infrastructure/MySQLConnection.php');
    require_once(__DIR__ . '/../domain/IRepository.php');

    class MySQLRepository implements IRepository{
        //!warn: use .env
        private $hostname="localhost";
        private $username="root";
        private $password="";
        private $database="taskdb";

        private $client;
        
        public function __construct(){
            $this->client = connect($this->hostname, $this->username, $this->password, $this->database);
        }

        public function save(\Task $task){
            $wrapper = $task->showDetails();

            $user = 2; //! contain id in the session.
            $title = $wrapper['title'];
            $text = $wrapper['text'];
            $tag = $wrapper['tag'];

            $sql = "INSERT INTO task (fk_user, title, text, tag) VALUES ('$user','$title','$text','$tag');";
            $query = $this->client->prepare($sql);
            $query->execute();

        }

        public function read($initial, $items){
            $sql = "SELECT * FROM task LIMIT :initial,:items";

            $query = $this->client->prepare($sql);
            $query->bindParam(':initial', $initial, PDO::PARAM_INT);
            $query->bindParam(':items', $items, PDO::PARAM_INT);
            $query->execute();
            $tasks = $query->fetchAll();

            return $tasks;

        }
  
    }
    

?>