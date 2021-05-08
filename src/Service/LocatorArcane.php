<?php


namespace App\Service;

use App\Repository\ArcaneMinorRepository;
use App\Repository\ArcaneRepository;
use Doctrine\ORM\NonUniqueResultException;

class LocatorArcane
{

    private ArcaneRepository $arcaneRepository;
    private ArcaneMinorRepository $arcaneMinorRepository;

    public function __construct(ArcaneRepository $arcaneRepository, ArcaneMinorRepository $arcaneMinorRepository)
    {
        $this->arcaneRepository = $arcaneRepository;
        $this->arcaneMinorRepository = $arcaneMinorRepository;
    }

    /**
     * @return array
     */
    public function locatorAllArcane(): array
    {
        return $this->arcaneRepository->findAllArcane();
    }

    /**
     * @return array
     */
    public function locatorAllMinorArcane(): array
    {
        return $this->arcaneMinorRepository->findAllMinorArcane();
    }


    /**
     * @param int $number
     * @return false|string
     * @throws NonUniqueResultException
     */
    public function locatorArcane(int $number): string
    {
        return $this->arcaneRepository->locatorArcaneById($number);
    }

}