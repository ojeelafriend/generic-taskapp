<?php
require_once(__DIR__ . '../../../domain/User.php');
require_once(__DIR__ . '/Inspect.php');
require_once(__DIR__ . '../../../domain/IUserRepository.php');
require_once(__DIR__ . '../../../domain/IMediaRepository.php.php');

class Maker extends Inspect
{
    private $repository;
    private $mediaRepository;

    public function __construct(\IUserRepository $repository, \IMediaRepository $mediaRepository)
    {
        $this->repository = $repository;
        $this->mediaRepository = $mediaRepository;
    }

    public function run(string $email, string $username, string $password)
    {
        $this->verify($email, $username, $password);
        $user = new User($email, $username, $password);

        $this->repository->save($user);
        $this->mediaRepository->init();
    }
}
