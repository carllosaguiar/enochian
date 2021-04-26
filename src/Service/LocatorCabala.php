<?php


namespace App\Service;


use App\Entity\Cabala;
use App\Repository\CabalaRepository;
use Doctrine\ORM\NonUniqueResultException;

class LocatorCabala
{

    private CabalaRepository $cabalaRepository;

    public function __construct(CabalaRepository $cabalaRepository)
    {
        $this->cabalaRepository = $cabalaRepository;
    }


    /**
     * @return Cabala[]
     */
    public function locatorAllCabala(): array
    {
        return $this->cabalaRepository->findAllPersonalCabala();
    }


    /**
     * @return Cabala
     * @throws NonUniqueResultException
     */
    public function locatorCabala(): Cabala
    {
        return $this->cabalaRepository->findPersonalCabalaById();
    }

}