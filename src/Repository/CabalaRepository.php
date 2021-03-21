<?php

namespace App\Repository;

use App\Entity\Cabala;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectRepository;

/**
 * @method Cabala|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cabala|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cabala[]    findAll()
 * @method Cabala[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CabalaRepository implements CabalaRepositoryInterface
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var ObjectRepository
     */
    private $objectRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->objectRepository = $this->entityManager->getRepository(Cabala::class);
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
     * @return Cabala|object[]
     */
    public function findAllPersonalCabala(): Cabala
    {
        return $this->objectRepository->findAll();
    }

}
