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
     * @return array
     */
    public function serviceSetFundamentalTonic(string $name): ?array
    {
        $cabala = new Cabala();
        $arcanes = $this->locator->locatorAllArcane();
        try {
            if(!empty($this->cabalaRepository->findInnerUrgencyById()))
            {
                $innerUrgency = $this->cabalaRepository->findInnerUrgencyById();
                $innerUrgency = array_column($innerUrgency[0], 'synthesis');
                return $cabala->calculateFundamentalTonic($name, $arcanes, $innerUrgency);
            }
        }catch (\Exception $e)
        {
            echo $e->getMessage();
        }

        return null;
    }

    /**
     * @param string $date
     * @return array|null
     */
    public function serviceSetTonicDay(string $date) : ?array
    {
        $cabala = new Cabala();
        $arcanes = $this->locator->locatorAllArcane();
        try {
            if(!empty($this->cabalaRepository->findFundamentalTonicById()))
            {
                $fundamentalTonic = $this->cabalaRepository->findFundamentalTonicById();
                $fundamentalTonic = array_column($fundamentalTonic[0], 'synthesis');
                return $cabala->calculateTonicDay($date, $arcanes, $fundamentalTonic);
            }
        } catch (\Exception $e)
        {
            echo $e->getMessage();
        }
        return null;
    }

    /**
     * @param string $dateTime
     * @return array|null
     */
   public function serviceSetEventDay(string $dateTime): ?array
   {
       $cabala = new Cabala();
       $major = $this->locator->locatorAllArcane();
       $minor = $this->locator->locatorAllMinorArcane();

       $arcanes = array_merge($major, $minor);

       try{
           if(!empty($this->cabalaRepository->findFundamentalTonicById()))
           {
               $fundamentalTonic = $this->cabalaRepository->findFundamentalTonicById();
               $fundamentalTonic = array_column($fundamentalTonic[0], 'synthesis');

               return $cabala->calculateEventDay($dateTime, $arcanes, $fundamentalTonic);
           }
       } catch (\Exception $e)
       {
           echo $e->getMessage();
       }
       return null;
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
    public function getTonicDayById(): array
    {
        return $this->cabalaRepository->findTonicDayById();
    }

    /**
     * @return array
     */
    public function getEventDayById(): array
    {
        return $this->cabalaRepository->findEventDayById();
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