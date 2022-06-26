<?php

require_once(__DIR__ . '../../domain/IMediaRepository.php');
require_once(__DIR__ . '../../domain/Photo.php');

class MySQLMediaRepository implements IMediaRepository
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "taskdb";

    private $client;

    private $userId;

    public function __construct()
    {
        $this->client = connect($this->hostname, $this->username, $this->password, $this->database);
        $this->userId = Session::getValue()['id_user'];
    }

    public function init()
    {
        $sql = "INSERT INTO media (id_user) VALUES ('$this->userId')";

        $query = $this->client->prepare($sql);
        $query->execute();
    }

    public function save(\Photo $photo)
    {
        $name = $photo->details()['name'];
        $sql = "UPDATE media SET photo='$name' WHERE id_user='$this->userId'";

        $query = $this->client->prepare($sql);
        $query->execute();
    }

    public function read()
    {
        $sql = "SELECT photo FROM media WHERE id_user='$this->userId'";
        $query = $this->client->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function delete()
    {
        $sql = "UPDATE media SET photo='removed' WHERE id_user='$this->userId'";

        $query = $this->client->prepare($sql);
        $query->execute();
    }
}
