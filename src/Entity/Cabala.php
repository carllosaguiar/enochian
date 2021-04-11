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
    private $birthCabala;

    /**
     * @ORM\Column(type="integer")
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
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="cabala", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


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
    public function getBirthCabala(): int
    {
        return $this->birthCabala;
    }

    /**
     * @param int $birthCabala
     * @return $this
     */
    public function setBirthCabala(int $birthCabala): self
    {
        $this->birthCabala = $birthCabala;

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
     * @param int $innerUrgency
     * @return $this
     */
    public function setInnerUrgency(int $innerUrgency): self
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
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

}