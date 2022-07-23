<?php
require_once(__DIR__ . '../../domain/IUserRepository.php');
require_once(__DIR__ . '../../../Shared/domain/Session.php');

class Editor
{
    private $repository;

    public function __construct(\IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($description)
    {
        $id = Session::getValue()['id'];

        //i will explain validation
        if (!$id || !$description) {
            throw new Error(false);
        }

        $this->repository->updateProfile($id, $description);
    }
}
