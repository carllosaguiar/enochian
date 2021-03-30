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
    private $birthCabal;

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
    private $tonicDay;

    /**
     * @ORM\Column(type="integer")
     */
    private $eventDay;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getBirthCabal(): int
    {
        return $this->birthCabal;
    }

    /**
     * @param int $birthCabal
     * @return $this
     */
    public function setBirthCabal(int $birthCabal): self
    {
        $this->birthCabal = $birthCabal;

        return $this;
    }

    /**
     * @return int
     */
    public function getInnerUrgency(): int
    {
        return $this->innerUrgency;
    }

    /**
     * @param string $innerUrgency
     * @return $this
     */
    public function setInnerUrgency(string $innerUrgency): self
    {
        $this->innerUrgency = $innerUrgency;
        return $this;
    }

    /**
     * @return int
     */
    public function getFundamentalTonic(): int
    {
        return $this->fundamentalTonic;
    }

    /**
     * @param int $fundamentalTonic
     * @return $this
     */
    public function setFundamentalTonic(int $fundamentalTonic): self
    {
        $this->fundamentalTonic = $fundamentalTonic;
        return $this;
    }

    /**
     * @return int
     */
    public function getTonicDay(): int
    {
        return $this->tonicDay;
    }

    /**
     * @param int $tonicDay
     * @return $this
     */
    public function setTonicDay(int $tonicDay): self
    {
        $this->tonicDay = $tonicDay;

        return $this;
    }

    /**
     * @return int
     */
    public function getEventDay(): int
    {
        return $this->eventDay;
    }

    /**
     * @param int $eventDay
     * @return $this
     */
    public function setEventDay(int $eventDay): self
    {
        $this->eventDay = $eventDay;
        return $this;
    }

    // functions for calculate personal cabala
    /**
     * @param string $year
     * @return int
     */
    public function calculateBirthCabala(string $year): int
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
    public function calculateTonicDay(int $number): int
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
    public function calculateEventDay(int $number): int
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
            'yearOfBirthCabal' => $this->getBirthCabal(),
            'innerUrgency' => $this->getInnerUrgency(),
            'fundamentalTonic' => $this->getFundamentalTonic(),
            'tonicOfTheDay' => $this->getTonicDay(),
            'eventOfTheDay' => $this->getEventDay()
        ];
    }

}