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
    public function setTonicDay(array $tonicDay): self
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
        $synthesis = 0;

        $amountEvent = (int) ($amountEvent == 0 || $amountEvent == null)  ? 0 : $amountEvent;

        for ($i = 0; $i < $amountEvent; $i++)
        {

            $sum = array_sum(str_split((int)$year)); // sum year birth
            $sumYear = $year + $sum; // sum year with year birth
            $partial = array_sum(str_split($sumYear)); // get first synthesis

            if($partial > 9)
            {
                $synthesis = array_sum(str_split($partial)); //generate synthesis

                array_push($arrayData, [
                    'sumYear' => $sumYear,
                    'partial' => $partial,
                    'synthesis' => $synthesis,
                    'majorArcaneName' => $allArcanesTarot[$partial-1]->getName(),
                    'majorArcaneImage' => $allArcanesTarot[$partial-1]->getImage(),
                    'minorArcaneName' => $allArcanesTarot[$synthesis-1]->getName(),
                    'minorArcaneImage' => $allArcanesTarot[$synthesis-1]->getImage()
                ]);

            }

            if($partial < 10)
            {
                $synthesis = array_sum(str_split($partial)); //generate synthesis

                array_push($arrayData, [
                    'sumYear' => $sumYear,
                    'partial' => null,
                    'synthesis' => $synthesis,
                    'majorArcaneName' => null,
                    'majorArcaneImage' => null,
                    'minorArcaneName' => $allArcanesTarot[$partial-1]->getName(),
                    'minorArcaneImage' => $allArcanesTarot[$partial-1]->getImage()
                ]);

            }

            $year = $sumYear;
        }

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

        $daySynthesis = array_sum(str_split($day));
        $monthSynthesis = array_sum(str_split($month));
        $yearSynthesis = array_sum(str_split($year));

        while($yearSynthesis > 9)
        {
            $yearSynthesis = array_sum(str_split($yearSynthesis));
        }

        $partial = ($daySynthesis + $monthSynthesis + $yearSynthesis);

        $synthesis = array_sum(str_split($partial));

        $result = $this->findArcaneByNumericSynthesis($synthesis, $arcanes);

        return $result;
    }

    /**
     * @param string $name
     * @return float|int|string|null
     */
    public function calculateFundamentalTonic(string $name, array $arcanes, $innerUrgency): array
    {
        $string = preg_replace("/[^A-Za-z]/","",$name);
        $totalCaracteres = strlen($string);
        $synthesis = array_sum(str_split($totalCaracteres));

        $int = (int)$innerUrgency[0];
        $sum = $synthesis + $int;
        $synthesis = strlen($sum);

        $result = $this->findArcaneByNumericSynthesis($synthesis, $arcanes);

        return $result;
    }

    /**
     * @param string $number
     * @return array|null
     */
    public function calculateTonicDay(string $date, $arcanes, $fundamentalTonic): ?array
    {

        $dateFormat = \DateTime::createFromFormat('Y-m-d', $date);
        $day = array_sum(str_split($dateFormat->format('d')));
        $month = array_sum(str_split($dateFormat->format('m')));
        $year = array_sum(str_split($dateFormat->format('Y')));

        $daySynthesis = array_sum(str_split($day));
        $monthSynthesis = array_sum(str_split($month));
        $yearSynthesis = array_sum(str_split($year));

        if($daySynthesis > 9)
        {
            $daySynthesis = array_sum(str_split($daySynthesis));
        }

        if($yearSynthesis > 9)
        {
            $yearSynthesis = array_sum(str_split($yearSynthesis));
        }

        $partial = ($daySynthesis + $monthSynthesis + $yearSynthesis);

        if($partial > 9)
        {
            $partial = array_sum(str_split($partial));
        }

        $int = (int)$fundamentalTonic[0];
        $synthesis = $partial + $int;

        if($synthesis > 9)
        {
            $synthesis = array_sum(str_split($synthesis));
        }

        return $this->findArcaneByNumericSynthesis($synthesis, $arcanes);

    }

    /**
     * @param $dateTime
     * @param $arcanes
     * @param $innerUrgency
     * @param $fundamentalTonic
     * @return array
     */
    public function calculateEventDay($dateTime, $arcanes, $fundamentalTonic): array
    {
        $dateFormat = \DateTime::createFromFormat('Y-m-d\TH:i', $dateTime);
        $day = array_sum(str_split($dateFormat->format('d')));
        $month = array_sum(str_split($dateFormat->format('m')));
        $year = array_sum(str_split($dateFormat->format('Y')));
        $hours = (int)$dateFormat->format('H');
        $yearFormat =  (int)$dateFormat->format('Y');
        $daySynthesis = array_sum(str_split($day));
        $monthSynthesis = array_sum(str_split($month));
        $yearSynthesis = array_sum(str_split($year));

        $dateFull = $dateFormat->format('d-m-Y');

        if($yearSynthesis > 9)
        {
            $yearSynthesis = array_sum(str_split($yearSynthesis));
        }

        $dateSynthesis = ($daySynthesis + $monthSynthesis + $yearSynthesis);

        if($dateSynthesis > 9)
        {
            $dateSynthesis = array_sum(str_split($dateSynthesis));
        }

        $partial = $dateSynthesis + $fundamentalTonic[0];

        $tonicDay;

        if($partial > 9 )
        {
            $tonicDay = array_sum(str_split($partial));
        }

        $eventDay = $tonicDay + $hours;

        if($eventDay > 9)
        {
            $eventDay = array_sum(str_split($eventDay));
        }

        foreach ($arcanes as $arcane)
        {
            if($partial == $arcane->getId())
            {
                $firstResult = [
                    'name' => $arcane->getName(),
                    'image' => $arcane->getImage(),
                    'partial' => $partial
                ];
            }

            if($tonicDay == $arcane->getId())
            {
                $secondResult = [
                    'name' => $arcane->getName(),
                    'image' => $arcane->getImage(),
                    'tonicDay' => $tonicDay
                ];
            }

            if($eventDay == $arcane->getId())
            {
                $event = [
                    'name' => $arcane->getName(),
                    'image' => $arcane->getImage(),
                    'eventDay' => $eventDay
                ];
            }
        }

        return [
            'dateFull' => $dateFull,
            'year' => $yearFormat,
            'hours' => $hours,
            'partial' => $firstResult,
            'synthesis' => $secondResult,
            'eventDay' => $event
        ];

    }

    /**
     * @param int $synthesis
     * @param array $arcanes
     * @return array
     */
    public function findArcaneByNumericSynthesis(int $synthesis, array $arcanes): array
    {
        $mount = [];


        foreach ($arcanes as $arcane) {
            if($synthesis == $arcane->getId())
            {
                $mount = [
                    'name' => $arcane->getName(),
                    'image' => $arcane->getImage(),
                    'synthesis' => $synthesis
                ];
                break;
            }
        }

        return $mount;
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