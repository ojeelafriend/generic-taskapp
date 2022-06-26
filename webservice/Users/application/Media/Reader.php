<?php

class Reader
{
    private $repository;

    public function __construct(\IMediaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        $name = $this->repository->read();
        $directory = $_SERVER['DOCUMENT_ROOT'];
        imagecreatefromjpeg($directory);
    }
}

/** 
 * 
 * while (false !== ($entrada = readdir($gestor))) {
        echo "$entrada\n";
    }
 * 
 */
