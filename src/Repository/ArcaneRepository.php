<?php

namespace App\Repository;

use App\Entity\Arcane;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;


final class ArcaneRepository
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var EntityRepository
     */
    private $entityRepository;

    /**
     * ArcaneRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->entityRepository = $entityManager->getRepository(Arcane::class);
    }

    /**
     * @param int $id
     * @return Arcane|object
     */
    public function findById(int $id): Arcane
    {
        return $this->entityRepository->find($id);
    }

    /**
     * @return array
     */
    public function findAllArcane(): array
    {
        return $this->entityRepository->findAll();
    }

    /**
     * @param Arcane $arcane
     */
    public function save(Arcane $arcane): void
    {
        $this->entityManager->persist($arcane);
        $this->entityManager->flush();
    }

}
