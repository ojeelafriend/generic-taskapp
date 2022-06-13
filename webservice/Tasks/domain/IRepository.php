<?php
    interface IRepository{
        public function save(\Task $task);
        public function read(int $initial, int $indexPage);
        public function checkRows();
        public function delete(int $taskId);
    }
?>