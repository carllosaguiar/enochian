<?php

namespace App\Repository;

use App\Entity\ArcaneMinor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArcaneMinor|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArcaneMinor|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArcaneMinor[]    findAll()
 * @method ArcaneMinor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArcaneMinorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArcaneMinor::class);
    }

    // /**
    //  * @return ArcaneMinor[] Returns an array of ArcaneMinor objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArcaneMinor
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
