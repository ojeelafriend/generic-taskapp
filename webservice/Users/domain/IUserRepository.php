<?php
require_once(__DIR__ . "../../domain/User.php");

interface IUserRepository
{
    function save(\User $user);
    function compare(string $email);
    function updateProfile(int $id, string $description);
}
