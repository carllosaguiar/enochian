<?php


namespace App\Service;


use App\Entity\Cabala;
use App\Entity\Profile;
use App\Repository\ProfileRepository;
use Doctrine\ORM\NonUniqueResultException;

class ProfileService
{

    private ProfileRepository $profileRepository;
    private Zodiac $zodiac;

    public function __construct(ProfileRepository $profileRepository, Zodiac $zodiac)
    {
        $this->profileRepository = $profileRepository;
        $this->zodiac = $zodiac;
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

    public function generateZodiac($day, $mount): array
    {
        $this->zodiac->setDay($day);
        $this->zodiac->setMonth($mount);

        return $this->zodiac->mountSign();
    }
}