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
     * @ORM\Column(type="array", nullable=true)
     */
    private ?array $birthCabala = null;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private ?array $innerUrgency;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private ?array $fundamentalTonic;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private ?array $tonicDay;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private ?array $eventDay;

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
     * @return array|null
     */
    public function getInnerUrgency(): ?array
    {
        if(empty($this->innerUrgency))
        {
            return null;
        }
        return $this->innerUrgency;
    }

    /**
     * @param array $innerUrgency
     * @return $this
     */
    public function setInnerUrgency(array $innerUrgency): self
    {
        $this->innerUrgency = $innerUrgency;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getFundamentalTonic(): ?array
    {
        if(empty($this->fundamentalTonic))
        {
            return null;
        }
        return $this->fundamentalTonic;
    }

    /**
     * @param array $fundamentalTonic
     * @return $this
     */
    public function setFundamentalTonic(array $fundamentalTonic): self
    {

        $this->fundamentalTonic = $fundamentalTonic;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getTonicDay(): ?array
    {
        if(empty($this->tonicDay))
        {
            return null;
        }
        return $this->tonicDay;
    }

    /**
     * @param array $tonicDay
     * @return $this
     */
    public function setTonicDay(int $tonicDay): self
    {
        $this->tonicDay = $tonicDay;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getEventDay(): ?array
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
    public function setEventDay(array $eventDay): self
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
    public function calculateBirthCabala(array $allArcanesTarot, int $year, $amountEvent): array
    {
        $arrayData = [];

        $amountEvent = (int) ($amountEvent == 0 || $amountEvent == null)  ? 0 : $amountEvent;

        for ($i = 0; $i < $amountEvent; $i++)
        {
            $index = [];
            $sum = array_sum(str_split((int)$year)); // sum year birth
            $sumYear = $year + $sum; // sum year with year birth
            $partial = array_sum(str_split($sumYear)); // get first synthesis
            if($partial > 9)
            {
                $synthesis = array_sum(str_split($partial)); //get second synthesis
            } else {
                $synthesis = null;
            }

            array_push($arrayData, [
                $sumYear,
                $partial,
                $synthesis,
                $allArcanesTarot[$partial-1]->getName(),
                !empty($synthesis)? $allArcanesTarot[$synthesis-1]->getName() : null,
                $allArcanesTarot[$partial-1]->getImage(),
                !empty($synthesis)? $allArcanesTarot[$synthesis-1]->getImage() : null
            ]);

            $year = $sumYear;
        }
        dump($arrayData);

        //return year, first synthesis and second synthesis
        return $arrayData;
    }


    /**
     * @param string $date
     * @param $arcane
     * @return array
     */
    public function calculateInnerUrgency(string $date, $arcanes): array
    {
        $checkedArcane = [];

        $dateFormat = \DateTime::createFromFormat('Y-m-d', $date);
        $day = array_sum(str_split($dateFormat->format('d')));
        $month = array_sum(str_split($dateFormat->format('m')));
        $year = array_sum(str_split($dateFormat->format('Y')));

        $partial = ($day + $month + $year);

        $synthesis = array_sum(str_split($partial));

        $result = $this->findArcaneByNumericSynthesis($synthesis, $arcanes);

        return $result;
    }

    /**
     * @param string $name
     * @return float|int|string|null
     */
    public function calculateFundamentalTonic(string $name, array $arcanes): array
    {
        $string = preg_replace("/[^A-Za-z]/","",$name);
        $totalCaracteres = strlen($string);
        $synthesis = array_sum(str_split($totalCaracteres));

        $result = $this->findArcaneByNumericSynthesis($synthesis, $arcanes);

        return $result;
    }

    public function findArcaneByNumericSynthesis(int $synthesys, array $arcanes): array
    {
        $mount = [];

        foreach ($arcanes as $arcane) {
            if($synthesys == $arcane['id'])
            {
                $mount = [
                    'name' => $arcane['name'],
                    'image' => $arcane['image'],
                    'synthesis' => $synthesys
                ];
                break;
            }
        }

        return $mount;
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