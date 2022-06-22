<?php

require_once(__DIR__ . '../../../Shared/infrastructure/MySQLConnection.php');
require_once(__DIR__ . '../../domain/IUserRepository.php');
require_once(__DIR__ . '../../domain/User.php');

class MySQLUserRepository implements IUserRepository
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "taskdb";

    private $client;

    public function __construct()
    {
        $this->client = connect($this->hostname, $this->username, $this->password, $this->database);
    }

    public function save(\User $user)
    {
        $wrapper = $user->profile();

        $email = $wrapper['email'];
        $username = $wrapper['username'];
        $password = $wrapper['password'];

        $sql = "INSERT INTO user (email, username, password) VALUES ('$email', '$username', '$password')";

        $query = $this->client->prepare($sql);
        $query->execute();
    }

    public function compare($email)
    {
        $sql = "SELECT id_user, email, username, password, rank FROM user WHERE email='$email'";

        $query = $this->client->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}
