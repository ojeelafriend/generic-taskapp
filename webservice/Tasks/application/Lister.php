<?php
    require_once(__DIR__ . '../../domain/IRepository.php');

    class Lister{
        private $repository;

        public function __construct(\IRepository $repository){
            $this->repository = $repository;
        }

        public function run(int $initial, int $items){
            if($initial == null || $items == null){
                throw new ListException('Number of items or initial have null values');
            }
            
            $tasks = $this->repository->read($initial, $items);

            if(!$tasks){
                throw new ListException('Tasks dont exist, check initial or requested items');
            }

            return $tasks;

        }

        public function countItems(){
            return $this->repository->checkRows();
        }
    }

?>