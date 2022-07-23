<?php

/** Algo a tener en cuenta: 
 * El dominio está actuando dentro de infraestructura
 *  y sobrecarga la responsabilidad. La interrogante es que,
 * al sacar la destructuración de las entidades de esta capa,
 * el dominio deja de tener participación y se vuelve inservible.
 * 
 * odev
 *  */

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
        $description = $wrapper['description'];

        $sql = "INSERT INTO user (email, username, password, description) VALUES ('$email', '$username', '$password', '$description')";

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

    public function updateProfile($id, $description)
    {
        $sql = "UPDATE user SET description='$description' WHERE id_user='$id'";

        $query = $this->client->prepare($sql);
        $query->execute();
    }
}
