<?php


namespace App\Service;

use App\Entity\ArcaneMajor;
use App\Entity\ArcaneMinor;
use App\Repository\ArcaneMinorRepository;
use App\Repository\ArcaneRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\ORMException;

final class ArcaneService
{
    /**
     * @var ArcaneRepository
     */
    private ArcaneRepository $arcaneMajorRepository;
    private ArcaneMinorRepository $arcaneMinorRepository;

    /**
     * ArcaneService constructor.
     * @param ArcaneRepository $arcaneRepository
     * @param ArcaneMinorRepository $arcaneMinorRepository
     */
    public function __construct(ArcaneRepository $arcaneRepository, ArcaneMinorRepository $arcaneMinorRepository)
    {
        $this->arcaneMajorRepository = $arcaneRepository;
        $this->arcaneMinorRepository = $arcaneMinorRepository;
    }

    /**
     * @param $id
     * @return ArcaneMajor
     * @throws NonUniqueResultException
     */
    public function getArcaneById($id): ArcaneMajor
    {
        return $this->arcaneMajorRepository->findById($id);
    }

    /**
     * @return array
     */
    public function getAllArcane(): array
    {
        return $this->arcaneMajorRepository->findAllArcane();
    }

    /**
     * @param ArcaneMajor $arcane
     * @throws ORMException
     */
    public function updateArcane(ArcaneMajor $arcane): void
    {
        $this->arcaneMajorRepository->save($arcane);
    }

    /**
     * @param int $number
     * @return string
     * @Annotation
     * @throws NonUniqueResultException
     */
    public function locatorArcaneById(int $number): string
    {
        return $this->arcaneMajorRepository->findById($number)->getImage();
    }


    // Session intended for use with minor arcana.
    /**
     * @return array
     */
    public function getAllMinorArcane(): array
    {
        return $this->arcaneMinorRepository->findAll();
    }

    /**
     * @param $id
     * @return ArcaneMinor|null
     */
    public function getMinorArcaneById($id): ?ArcaneMinor
    {
        return $this->arcaneMinorRepository->find($id);
    }
}