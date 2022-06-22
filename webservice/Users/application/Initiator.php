<?php

require_once(__DIR__ . '../../../Shared/domain/Session.php');

class Initiator
{
    private $repository;

    public function __construct(\IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(string $email, string $password)
    {
        $user = $this->repository->compare($email);

        if (!$user) {
            throw new Error('Email or password incorrect');
        }

        if (!hash_equals($password, $user[0]['password'])) {
            throw new Error('Email or password incorrect');
        }

        new Session($user[0]['id_user'], $user[0]['username'], $user[0]['rank']);
    }
}
