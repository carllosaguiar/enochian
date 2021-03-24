<?php

namespace App\Repository;

use App\Entity\Arcane;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

/**
 * @method Arcane|null find($id, $lockMode = null, $lockVersion = null)
 * @method Arcane|null findOneBy(array $criteria, array $orderBy = null)
 * @method Arcane[]    findAll()
 * @method Arcane[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class ArcaneRepository
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var ObjectRepository
     */
    private $objectRepository;

    /**
     * ArcaneRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param int $id
     * @return Arcane|object
     */
    public function findById(int $id): Arcane
    {
        return $this->objectRepository->find($id);
    }

    /**
     * @param string $name
     * @return object|null
     */
    public function findArcaneByName(string $name): ?object
    {
        return $this->objectRepository->findOneBy(['name' => $name]);
    }

    /**
     * @return Arcane|object[]
     */
    public function findAllArcane(): Arcane
    {
        return $this->objectRepository->findAll();
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
