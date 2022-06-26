<?php

require_once(__DIR__ . '../../../domain/IMediaRepository.php');
require_once(__DIR__ . '../../../domain/Photo.php');
require_once(__DIR__ . '../../Media/Sizer.php');

class Guider
{
    private $repository;

    public function __construct(\IMediaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($name, $tmp_file, $size)
    {
        if (!Sizer::verify($size, $name)) {
            throw new Error("size not tolerated");
        }

        $local = '/generic-taskapp/webservice/Users/infrastructure/images/';
        $directory = $_SERVER['DOCUMENT_ROOT'] . $local;

        move_uploaded_file($tmp_file, $directory . $name);

        $photo = new Photo($name, $tmp_file);
        $this->repository->save($photo);
    }
}
