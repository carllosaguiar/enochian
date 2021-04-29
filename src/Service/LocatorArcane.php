<?php


namespace App\Service;


use App\Entity\ArcaneMajor;
use App\Repository\ArcaneRepository;
use Doctrine\ORM\NonUniqueResultException;

class LocatorArcane
{

    private ArcaneRepository $arcaneRepository;

    public function __construct(ArcaneRepository $arcaneRepository)
    {
        $this->arcaneRepository = $arcaneRepository;
    }

    /**
     * @return ArcaneMajor[]
     */
    public function locatorAllArcane(): array
    {
        return $this->arcaneRepository->findAllArcane();
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