<?php
require_once(__DIR__ . '../../domain/IRepository.php');
require_once(__DIR__ . '../../application/exceptions/ListException.php');

class Searcher
{
    private $repository;

    public function __construct(\IRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(string $search)
    {
        $tasks = $this->repository->search($search);

        if (!$tasks) {
            throw new ListException('Tasks dont exist, check initial or requested items');
        }

        return $tasks;
    }
}
