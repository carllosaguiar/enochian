<?php


namespace App\Service;


use App\Entity\Cabala;
use App\Entity\Profile;
use App\Repository\ProfileRepository;
use Doctrine\ORM\NonUniqueResultException;

class ProfileService
{

    private ProfileRepository $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    /**
     * @return Profile|null
     * @throws NonUniqueResultException
     */
    public function getUserProfile(): ?Profile
    {
        return $this->profileRepository->findUserProfileById();
    }

    /**
     * @param LocatorArcane $arcaneLocator
     * @param int $id
     * @return false|string
     * @throws NonUniqueResultException
     */
    public function locatorUrlArcane(LocatorArcane $arcaneLocator, int $id): string
    {
        return $arcaneLocator->locatorArcane($id);
    }
}