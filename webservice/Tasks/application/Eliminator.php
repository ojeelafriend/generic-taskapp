<?php

require_once(__DIR__ . '../../domain/IRepository.php');

class Eliminator
{
    private $repository;

    public function __construct(\IRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($taskId)
    {
        $this->repository->delete($taskId);
    }
}
