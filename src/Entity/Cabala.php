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
    private ?array $birthCabala = null;

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
     * @return int|null
     */
    public function getId(): ?int
    {
        if(empty($this->id))
        {
            return null;
        }
        return $this->id;
    }

    /**
     * @return array|null
     */
    public function getBirthCabala(): ?array
    {
        if(empty($this->birthCabala))
        {
            return null;
        }
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
     * @return int|null
     */
    public function getInnerUrgency(): ?int
    {
        if(empty($this->innerUrgency))
        {
            return null;
        }
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
     * @return int|null
     */
    public function getFundamentalTonic(): ?int
    {
        if(empty($this->fundamentalTonic))
        {
            return null;
        }
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
     * @return int|null
     */
    public function getTonicDay(): ?int
    {
        if(empty($this->tonicDay))
        {
            return null;
        }
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
     * @return int|null
     */
    public function getEventDay(): ?int
    {
        if(empty($this->eventDay))
        {
            return null;
        }
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

        for ($i = 0; $i < $amountEvent; $i++)
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
     * @param $date
     * @return int
     */
    public function calculateInnerUrgency(string $date): int
    {
        $dateFormat = \DateTime::createFromFormat('Y-m-d', $date);
        $day = array_sum(str_split($dateFormat->format('d')));
        $month = array_sum(str_split($dateFormat->format('m')));
        $year = array_sum(str_split($dateFormat->format('Y')));

        $partial = ($day + $month + $year);

        $final = array_sum(str_split($partial));

        return $final;
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