<?php


namespace App\Service;


use App\Entity\Profile;
use App\Entity\User;
use App\Repository\ProfileRepository;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

class ProfileService
{

    private $profileRepository;
    private $userRepository;

    public function __construct(ProfileRepository $profileRepository, UserRepository $userRepository)
    {
        $this->profileRepository = $profileRepository;
        $this->userRepository = $userRepository;
    }

    public function gerUserProfile(): ?Profile
    {
        return $this->profileRepository->getUserProfileById();
    }

    public function viewAllProfile(): array
    {
        return $this->profileRepository->findAll();

    }
}