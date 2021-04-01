<?php


namespace App\Service;

use App\Entity\Arcane;
use App\Repository\ArcaneRepository;
use Doctrine\ORM\ORMException;

final class ArcaneService
{
    /**
     * @var ArcaneRepository
     */
    private $arcaneRepository;

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
     * @return Arcane
     */
    public function findArcaneById($id): Arcane
    {
        return $this->arcaneRepository->findById($id);
    }

    /**
     * @return array
     */
    public function findAllArcane(): array
    {
        return $this->arcaneRepository->findAllArcane();
    }

    /**
     * @param Arcane $arcane
     * @throws ORMException
     */
    public function updateArcane(Arcane $arcane): void
    {
        $this->arcaneRepository->save($arcane);
    }

    /**
     * @param int $number
     * @return string
     * @Annotation
     */
    public function locatorArcaneById(int $number): string
    {
        return $this->arcaneRepository->findById($number)->getImage();
    }
}