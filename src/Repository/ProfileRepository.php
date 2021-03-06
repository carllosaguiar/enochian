<?php

namespace App\Repository;

use App\Entity\Profile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Security;

/**
 * @method Profile|null find($id, $lockMode = null, $lockVersion = null)
 * @method Profile|null findOneBy(array $criteria, array $orderBy = null)
 * @method Profile[]    findAll()
 * @method Profile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfileRepository extends ServiceEntityRepository
{
    private Security $security;

    public function __construct(ManagerRegistry $registry, Security $security)
    {
        parent::__construct($registry, Profile::class);
        $this->security = $security;
    }

    /**
     * @return Profile|null
     * @throws NonUniqueResultException
     */
    public function findUserProfileById(): ?Profile
    {
        $currentUser = $this->security->getUser();

        return $this->createQueryBuilder('p')
            ->andWhere('p.user = :val')
            ->setParameter('val', $currentUser)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    public function findAllZodiac()
    {
        return $this->createQueryBuilder('p')
            ->select('p.zodiac')
            ->andWhere('p.zodiac IS NOT NULL')
            ->getQuery()
            ->getResult()
            ;
    }

}
