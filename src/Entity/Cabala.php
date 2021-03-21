<?php

namespace App\Entity;

use App\Repository\CabalaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CabalaRepository::class)
 */
class Cabala
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $yearOfBirthCabal;

    /**
     * @ORM\Column(type="blob")
     */
    private $innerUrgency;

    /**
     * @ORM\Column(type="integer")
     */
    private $fundamentalTonic;

    /**
     * @ORM\Column(type="integer")
     */
    private $tonicOfTheDay;

    /**
     * @ORM\Column(type="integer")
     */
    private $eventOfTheDay;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYearOfBirthCabal(): ?int
    {
        return $this->yearOfBirthCabal;
    }

    public function setYearOfBirthCabal(int $yearOfBirthCabal): self
    {
        $this->yearOfBirthCabal = $yearOfBirthCabal;

        return $this;
    }

    public function getInnerUrgency(): string
    {
        return $this->innerUrgency;
    }

    public function setInnerUrgency(string $innerUrgency): self
    {
        $this->innerUrgency = $innerUrgency;
        return $this;
    }

    public function getFundamentalTonic(): ?int
    {
        return $this->fundamentalTonic;
    }

    public function setFundamentalTonic(int $fundamentalTonic): self
    {
        $this->fundamentalTonic = $fundamentalTonic;
        return $this;
    }

    public function getTonicOfTheDay(): ?int
    {
        return $this->tonicOfTheDay;
    }

    public function setTonicOfTheDay(int $tonicOfTheDay): self
    {
        $this->tonicOfTheDay = $tonicOfTheDay;
        return $this;
    }

    public function getEventOfTheDay(): ?int
    {
        return $this->eventOfTheDay;
    }

    public function setEventOfTheDay(int $eventOfTheDay): self
    {
        $this->eventOfTheDay = $eventOfTheDay;
        return $this;
    }

    // functions for calculate personal cabala
    /**
     * @param string $year
     * @return int
     */
    public function calculateYearOfBirthCabala(string $year): int
    {
        return 1;
    }

    /**
     * @param int $number
     * @return int
     */
    public function calculateInnerUrgency(int $number): int
    {
        return 1;
    }

    /**
     * @param int $number
     * @return int
     */
    public function calculateTonicOfTheDay(int $number): int
    {
        return 1;
    }

    /**
     * @param int $number
     * @return int
     */
    public function calculateFundamentalTonic(int $number): int
    {
        return 1;
    }

    /**
     * @param int $number
     * @return int
     */
    public function calculateEventOfTheDay(int $number): int
    {
        return 1;
    }

    /**
     * @return array
     */
    public function findAllCabalaOfUser():array
    {
        return [
            'id' => $this->getId(),
            'yearOfBirthCabal' => $this->getYearOfBirthCabal(),
            'innerUrgency' => $this->getInnerUrgency(),
            'fundamentalTonic' => $this->getFundamentalTonic(),
            'tonicOfTheDay' => $this->getTonicOfTheDay(),
            'eventOfTheDay' => $this->getEventOfTheDay()
        ];
    }

}
