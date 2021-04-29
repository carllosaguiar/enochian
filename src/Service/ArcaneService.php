<?php


namespace App\Service;

use App\Entity\ArcaneMajor;
use App\Repository\ArcaneRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\ORMException;

final class ArcaneService
{
    /**
     * @var ArcaneRepository
     */
    private ArcaneRepository $arcaneRepository;

    /**
     * ArcaneService constructor.
     * @param ArcaneRepository $arcaneRepository
     */
    public function __construct(ArcaneRepository $arcaneRepository)
    {
        $this->arcaneRepository = $arcaneRepository;
    }

    /**
     * @param $id
     * @return ArcaneMajor
     * @throws NonUniqueResultException
     */
    public function getArcaneById($id): ArcaneMajor
    {
        return $this->arcaneRepository->findById($id);
    }

    /**
     * @return array
     */
    public function getAllArcane(): array
    {
        return $this->arcaneRepository->findAllArcane();
    }

    /**
     * @param ArcaneMajor $arcane
     * @throws ORMException
     */
    public function updateArcane(ArcaneMajor $arcane): void
    {
        $this->arcaneRepository->save($arcane);
    }

    /**
     * @param int $number
     * @return string
     * @Annotation
     * @throws NonUniqueResultException
     */
    public function locatorArcaneById(int $number): string
    {
        return $this->arcaneRepository->findById($number)->getImage();
    }
}