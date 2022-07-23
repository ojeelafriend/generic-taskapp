<?php

class User
{
    private $email;
    private $username;
    private $password;
    private $description;

    public function __construct($email, $username, $password)
    {
        $this->email = $email;
        $this->username = $username;
        $this->password = hash('sha256', $password);
        $this->description = "Hey, im new user";
    }

    public function profile()
    {
        return [
            'email' => $this->email,
            'username' => $this->username,
            'password' => $this->password,
            'description' => $this->description
        ];
    }
}
