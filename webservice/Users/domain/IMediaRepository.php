<?php
require_once(__DIR__ . '../../domain/Photo.php');

interface IMediaRepository
{
    function init();
    function save(\Photo $photo);
    function read();
    function delete();
}
