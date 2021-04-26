<?php


namespace App\Service;


use App\Entity\Cabala;
use App\Entity\Profile;
use App\Entity\User;
use App\Repository\ProfileRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

class ProfileService
{

    private ProfileRepository $profileRepository;
    private UserRepository $userRepository;
    private LocatorCabala $locator;

    public function __construct(ProfileRepository $profileRepository, UserRepository $userRepository, LocatorCabala $locator)
    {
        $this->profileRepository = $profileRepository;
        $this->userRepository = $userRepository;
        $this->locator = $locator;
    }

    /**
     * @return Profile|null
     * @throws NonUniqueResultException
     */
    public function getUserProfile(): ?Profile
    {
        return $this->profileRepository->findUserProfileById();
    }

    public function viewAllProfile(): array
    {
        return $this->profileRepository->findAll();

    }

    /**
     * @return Cabala
     * @throws NonUniqueResultException
     */
    public function locatorCabala(): Cabala
    {
        return $this->locator->locatorCabala();
    }

    /**
     * @param int $number
     * @return false|string
     * @throws NonUniqueResultException
     */
    public function locatorAbsoluteUrlArcane(int $number): string
    {
        return $this->locator->locatorCabala($number);
    }

}