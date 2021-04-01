<?php

namespace App\Repository;

use App\Entity\Cabala;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cabala|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cabala|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cabala[]    findAll()
 * @method Cabala[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CabalaRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cabala::class);
    }

    public function findYearOfBirthCabala(){}
    public function createYearOfBirthCabal(int $number){}

    public function findInnerUrgency(){}
    public function createInnerUrgency(int $number){}

    public function findFundamentalTonic(){}
    public function createFundamentalTonic(int $number){}

    public function findTonicOfTheDay(){}
    public function createTonicOfTheDay(int $number){}

    public function findEventOfTheDay(){}
    public function createEventOfTheDay(int $number){}

    /**
     * @return Cabala[]
     */
    public function findAllPersonalCabala(): array
    {
        return $this->findAll();
    }

}
