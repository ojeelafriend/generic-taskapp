<?php

class Photo
{
    private string $tmp_file;
    private string $name;

    public function __construct($name, $tmp_file)
    {
        $this->name = $name;
        $this->tmp_file = $tmp_file;
    }

    public function details()
    {
        return ["name" => $this->name, "tmp_file" => $this->tmp_file];
    }
}
