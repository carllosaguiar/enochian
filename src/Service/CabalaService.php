<?php


namespace App\Service;

use App\Entity\Cabala;
use App\Repository\CabalaRepository;


class CabalaService
{

    private $cabalaRepository;
    private $locator;

    public function __construct(CabalaRepository $cabalaRepository, LocatorArcane $locator)
    {
        $this->cabalaRepository = $cabalaRepository;
        $this->locator = $locator;
    }

    public function findYearOfBirthCabala()
    {
        $this->cabalaRepository->findYearOfBirthCabala();
    }

    public function findInnerUrgency()
    {
        $this->cabalaRepository->findInnerUrgency();
    }

    public function findFundamentalTonic()
    {
        $this->cabalaRepository->findFundamentalTonic();
    }

    public function findTonicOfTheDay()
    {
        $this->cabalaRepository->findFundamentalTonic();
    }

    public function findEventOfTheDay()
    {
        $this->cabalaRepository->findEventOfTheDay();
    }

    public function findAllPersonalCabala()
    {
        return $this->cabalaRepository->findAllPersonalCabala();
    }

    /**
     * @param int $number
     * @return false|string
     */
    public function locatorAbsoluteUrlArcane(int $number): string
    {
        return $this->locator->locatorArcane($number);
    }
}