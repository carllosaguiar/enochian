<?php

namespace App\Repository;

use App\Entity\Axiom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Axiom|null find($id, $lockMode = null, $lockVersion = null)
 * @method Axiom|null findOneBy(array $criteria, array $orderBy = null)
 * @method Axiom[]    findAll()
 * @method Axiom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AxiomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Axiom::class);
    }

    // /**
    //  * @return Axiom[] Returns an array of Axiom objects
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
    public function findOneBySomeField($value): ?Axiom
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
