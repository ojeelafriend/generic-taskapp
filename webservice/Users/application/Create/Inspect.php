<?php

class Inspect
{
    private $error = [];

    public function verify(string $email, string $username, string $password)
    {
        if (!isset($email, $username, $password)) {
            array_push($this->error, "All three fields are strictly required");
        }

        if (count($this->error) > 0) {
            $errors = implode(", ", $this->error);
            throw new FieldException($errors, count($this->error));
        }
    }
}
