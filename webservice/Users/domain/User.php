<?php

class User
{
    private $email;
    private $username;
    private $password;

    public function __construct($email, $username, $password)
    {
        $this->email = $email;
        $this->username = $username;
        $this->password = hash('sha256', $password);
    }

    public function profile()
    {
        return ['email' => $this->email, 'username' => $this->username, 'password' => $this->password];
    }
}
