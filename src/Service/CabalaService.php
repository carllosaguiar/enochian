<?php


namespace App\Service;

use App\Entity\ArcaneMajor;
use App\Entity\Cabala;
use App\Repository\CabalaRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\Query;


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
     * @return Cabala|null
     * @throws NonUniqueResultException
     */
    public function getPersonalCabala(): ?Cabala
    {
        return $this->cabalaRepository->findPersonalCabalaById();
    }


    /**
     * @param int $year
     * @param int $amountEvents
     * @return array
     */
    public function serviceSetBirthCabala(int $year, int $amountEvents): array
    {
        $cabala = new Cabala();
        $majorArcane = $this->locator->locatorAllArcane();
        $minorArcane = $this->locator->locatorAllMinorArcane();

        $allArcanesTarot = array_merge($majorArcane, $minorArcane);

        return $cabala->calculateBirthCabala($allArcanesTarot, $year, $amountEvents);
    }


    /**
     * @param string $date
     * @return array
     */
    public function serviceSetInnerUrgency(string $date): array
    {
        $cabala = new Cabala();
        $arcanes = $this->locator->locatorAllArcane();
        return $cabala->calculateInnerUrgency($date, $arcanes);
    }


    /**
     * @param string $name
     * @return float|int|string|null
     */
    public function serviceSetFundamentalTonic(string $name)
    {
        $cabala = new Cabala();
        $arcanes = $this->locator->locatorAllArcane();
        return $cabala->calculateFundamentalTonic($name, $arcanes);
    }


    /**
     * @return array
     */
    public function getBirthCabalaById(): array
    {
        return $this->cabalaRepository->findBirthCabalaById();
    }


    /**
     * @return array
     */
    public function getInnerUrgencyById(): array
    {
        return $this->cabalaRepository->findInnerUrgencyById();
    }


    /**
     * @return array
     */
    public function getFundamentalTonicById(): array
    {
        return $this->cabalaRepository->findFundamentalTonicById();
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
     * @throws NonUniqueResultException
     */
    public function locatorUrlArcane(int $number): string
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