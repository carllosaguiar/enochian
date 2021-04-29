<?php


namespace App\Service;

use App\Entity\ArcaneMajor;
use App\Entity\Cabala;
use App\Repository\CabalaRepository;
use Doctrine\ORM\NonUniqueResultException;


class CabalaService
{

    private CabalaRepository $cabalaRepository;
    private LocatorArcane $locator;

    public function __construct(CabalaRepository $cabalaRepository, LocatorArcane $locator)
    {
        $this->cabalaRepository = $cabalaRepository;
        $this->locator = $locator;
    }

    /**
     * @return Cabala
     * @throws NonUniqueResultException
     */
    public function getPersonalCabala(): ?Cabala
    {
        return $this->cabalaRepository->findPersonalCabalaById();
    }

    public function serviceSetYearOfBirth(int $year, int $amountEvents): array
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
     * @return ArcaneMajor[]
     */
    public function locatorArcanes(): array
    {
        return $this->locator->locatorAllArcane();
    }

    /**
     * @param int $number
     * @return false|string
     */
    public function locatorAbsoluteUrlArcane(int $number): string
    {
        return $this->locator->locatorArcane($number);
    }

    /**
     * @param $id
     * @return int|mixed|string
     */
    public function remove($id)
    {
        return $this->cabalaRepository->removeBirthCabalaById($id);
    }

}