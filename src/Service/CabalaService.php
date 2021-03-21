<?php


namespace App\Service;

use App\Entity\Cabala;
use App\Repository\CabalaRepository;


class CabalaService
{

    private $cabalaRepository;

    public function __construct(CabalaRepository $cabalaRepository)
    {
        $this->cabalaRepository = $cabalaRepository;
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

}