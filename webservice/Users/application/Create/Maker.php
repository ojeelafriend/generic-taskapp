<?php
require_once(__DIR__ . '../../../domain/User.php');
require_once(__DIR__ . '/Inspect.php');
require_once(__DIR__ . '../../../domain/IUserRepository.php');

class Maker extends Inspect
{
    private $repository;

    public function __construct(\IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(string $email, string $username, string $password)
    {
        $this->verify($email, $username, $password);
        $user = new User($email, $username, $password);

        $this->repository->save($user);
    }
}
