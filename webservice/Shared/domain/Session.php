<?php
class Session
{
    public function __construct($userId, $username, $rank)
    {
        session_start();
        $_SESSION['id'] = $userId;
        $_SESSION['username'] = $username;
        $_SESSION['rank'] = $rank;
    }

    static public function destroy()
    {
        session_start();
        session_destroy();
        exit();
    }

    static public function getValue()
    {
        session_start();

        if (empty($_SESSION['id']) && empty($_SESSION['username']) && empty($_SESSION['rank'])) {
            return false;
        }

        return ["id" => $_SESSION['id'], "username" => $_SESSION['username'], "rank" => $_SESSION['rank']];
    }
}
