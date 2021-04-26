<?php


namespace App\Service;


use App\Entity\Arcane;
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
     * @return Arcane[]
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