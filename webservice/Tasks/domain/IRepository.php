<?php
interface IRepository
{
    public function save(\Task $task);
    public function read(int $initial, int $indexPage);
    public function search(string $search);
    public function checkRows();
    public function delete(int $taskId);
}
