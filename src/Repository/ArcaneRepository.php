<?php

namespace App\Repository;

use App\Entity\ArcaneMajor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArcaneMajor|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArcaneMajor|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArcaneMajor[]    findAll()
 * @method ArcaneMajor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class ArcaneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArcaneMajor::class);
    }

    /**
     * @param int $id
     * @return ArcaneMajor|object
     * @throws NonUniqueResultException
     */
    public function findById(int $id): ArcaneMajor
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.id = :val')
            ->setParameter('val', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * @return ArcaneMajor[]
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
     * @param int $number
     * @return false|string
     * @throws NonUniqueResultException
     */
    public function locatorArcaneById(int $number): string
    {
        return $this->findById($number)->getImage();
    }

}
