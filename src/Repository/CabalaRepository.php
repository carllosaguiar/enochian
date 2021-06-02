<?php

namespace App\Repository;

use App\Entity\Cabala;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Security;

/**
 * @method Cabala|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cabala|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cabala[]    findAll()
 * @method Cabala[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CabalaRepository extends ServiceEntityRepository
{

    private Security $security;

    public function __construct(ManagerRegistry $registry, Security $security)
    {
        parent::__construct($registry, Cabala::class);
        $this->security = $security;
    }


    /**
     * @return Cabala|null
     * @throws NonUniqueResultException
     */
    public function findPersonalCabalaById(): ?Cabala
    {
        $currentUser = $this->security->getUser();

        return $this->createQueryBuilder('c')
            ->andWhere('c.user = :val')
            ->setParameter('val', $currentUser)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }


    /**
     * @return Cabala[]
     */
    public function findAllPersonalCabala(): array
    {
        return $this->findAll();
    }

    /**
     * @return int|mixed|string
     */
    public function findAllCabala()
    {
        return $this->createQueryBuilder('c')
            ->select('c.birthCabala, c.innerUrgency, c.fundamentalTonic, c.tonicDay, c.eventDay')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return array
     */
    public function findBirthCabalaById(): array
    {
        $id = $this->security->getUser();

        $queryBuilder = $this->createQueryBuilder('c')
            ->select('c.birthCabala')
            ->where('c.user = :val')
            ->setParameter('val', $id)
            ;

        $query = $queryBuilder->getQuery();
        return $query->execute();
    }


    /**
     * @return array
     */
    public function findInnerUrgencyById(): array
    {
        $id = $this->security->getUser();

        $queryBuilder = $this->createQueryBuilder('c')
            ->select('c.innerUrgency')
            ->where('c.user = :val')
            ->setParameter('val', $id)
        ;

        $query = $queryBuilder->getQuery();
        return $query->execute();
    }


    /**
     * @return array
     */
    public function findFundamentalTonicById(): array
    {
        $id = $this->security->getUser();

        $queryBuilder = $this->createQueryBuilder('c')
            ->select('c.fundamentalTonic')
            ->where('c.user = :val')
            ->setParameter('val', $id)
        ;

        $query = $queryBuilder->getQuery();
        return $query->execute();
    }

    /**
     * @return array
     */
    public function findTonicDayById(): array
    {
        $id = $this->security->getUser();

        $queryBuilder = $this->createQueryBuilder('c')
            ->select('c.tonicDay')
            ->where('c.user = :val')
            ->setParameter('val', $id)
        ;

        $query = $queryBuilder->getQuery();
        return $query->execute();
    }

    /**
     * @return array
     */
    public function findEventDayById(): array
    {
        $id = $this->security->getUser();

        $queryBuilder = $this->createQueryBuilder('c')
            ->select('c.eventDay')
            ->where('c.user = :val')
            ->setParameter('val', $id)
        ;

        $query = $queryBuilder->getQuery();
        return $query->execute();
    }

    public function removeBirthCabalaById(int $id)
    {
        $query = $this->_em->createQueryBuilder()
            ->delete('App\Entity\Cabala', 'c')
            ->where('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery();
        $query->execute();
    }

}
