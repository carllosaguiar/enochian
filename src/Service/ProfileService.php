<?php


namespace App\Service;


use App\Entity\Profile;
use App\Entity\User;
use App\Repository\ProfileRepository;
use App\Repository\UserRepository;

class ProfileService
{

    private $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function viewProfile(): array
    {
        return $this->profileRepository->findAll();
    }
}