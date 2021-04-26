<?php

namespace App\Repository;

use App\Entity\Arcane;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Arcane|null find($id, $lockMode = null, $lockVersion = null)
 * @method Arcane|null findOneBy(array $criteria, array $orderBy = null)
 * @method Arcane[]    findAll()
 * @method Arcane[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class ArcaneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Arcane::class);
    }

    /**
     * @param int $id
     * @return Arcane|object
     * @throws NonUniqueResultException
     */
    public function findById(int $id): Arcane
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.id = :val')
            ->setParameter('val', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * @return Arcane[]
     */
    public function findAllArcane(): array
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param Arcane $arcane
     * @throws ORMException
     */
    public function save(Arcane $arcane): void
    {
        $this->_em->persist($arcane);
        $this->_em->flush();
    }

    /**
     * @param int $number
     * @return false|string
     * @throws NonUniqueResultException
     */
    public function locatorArcaneById(int $number): string
    {
        return $this->findById($number)->getImage();
    }

}
