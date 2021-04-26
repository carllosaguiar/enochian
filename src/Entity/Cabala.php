<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

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
    private int $id;

    /**
     * @ORM\Column(name="birth_cabala", type="array", nullable=true)
     */
    private array $birthCabala = [];

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $innerUrgency;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $fundamentalTonic;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $tonicDay;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $eventDay;

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
     * @return array
     */
    public function getBirthCabala(): array
    {
        return $this->birthCabala;
    }

    /**
     * @param array $birthCabala
     * @return $this
     */
    public function setBirthCabala(array $birthCabala): self
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
     * @param int $year
     * @param int $amountEvent
     * @return array
     */
    public function calculateYearOfBirth(int $year, int $amountEvent): array
    {
        $arrayData = [];

        $amountEvent = (int) ($amountEvent == 0 || $amountEvent == null)  ? 0 : $amountEvent;

        for ($i = 0; $i <= $amountEvent; $i++)
        {
            $sum = array_sum(str_split((int)$year)); // sum year birth
            $sumYear = $year + $sum; // sum year with year birth
            $firstSynthesis = array_sum(str_split($sumYear)); // get first synthesis
            if($firstSynthesis > 9)
            {
                $secondSynthesis = array_sum(str_split($firstSynthesis)); //get second synthesis
            } else {
                $secondSynthesis = null;
            }

            array_push($arrayData, [ $sumYear, $firstSynthesis, $secondSynthesis ]);

            $year = $sumYear;

        }

        //return year, first synthesis and second synthesis
        return $arrayData;
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