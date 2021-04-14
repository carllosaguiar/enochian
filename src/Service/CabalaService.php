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

    public function serviceSetYearOfBirth($year, $amountEvents): array
    {
        $cabala = new Cabala();
        return $cabala->calculateYearOfBirth($year, $amountEvents);
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

    /**
     * @return array
     */
    public function findAllPersonalCabala(): array
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