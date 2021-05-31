<?php


namespace App\Service;

class Zodiac
{

    private string $sign;
    private string $day;
    private string $month;
    private string $image;
    private array $zodiac;


    /**
     * @return string
     */
    public function getSign(): string
    {
        return $this->sign;
    }

    /**
     * @param $sign
     */
    public function setSign($sign): void
    {
        $this->sign = $sign;
    }
    /**
     * @return string
     */
    public function getDay(): string
    {
        return $this->day;
    }

    /**
     * @param string $day
     * @return Zodiac
     */
    public function setDay(string $day): Zodiac
    {
        $this->day = $day;
        return $this;
    }

    /**
     * @return string
     */
    public function getMonth(): string
    {
        return $this->month;
    }

    /**
     * @param string $month
     * @return Zodiac
     */
    public function setMonth(string $month): Zodiac
    {
        $this->month = $month;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Zodiac
     */
    public function setImage(string $image): Zodiac
    {
        $this->image = $image;
        return $this;
    }

    public function mountSign(): array
    {
        try{

            if (($this->day >= 21 && $this->month == 1) || ($this->day <= 18 && $this->month == 2) )
            {
                $this->setSign("Aquário");
                $this->setImage("https://d1ge7ke712cv9s.cloudfront.net/zodiac/zodiac_aquarius_icon_135004.png");
            }

            if (($this->day >= 19 && $this->month == 2) || ($this->day <= 20 && $this->month == 3) )
            {
                $this->setSign("Peixes");
                $this->setImage("https://d1ge7ke712cv9s.cloudfront.net/zodiac/zodiac_pisces_icon_137002.png");
            }

            if (($this->day >= 21 && $this->month == 3) || ($this->day <= 20 && $this->month == 4) )
            {
                $this->setSign("Aries");
                $this->setImage("https://d1ge7ke712cv9s.cloudfront.net/zodiac/zodiac_aries_icon_137003.png");
            }

            if (($this->day >= 21 && $this->month == 4) || ($this->day <= 20 && $this->month == 5) )
            {
                $this->setSign("Touro");
                $this->setImage("https://d1ge7ke712cv9s.cloudfront.net/zodiac/zodiac_taurus_icon_136001.png");
            }

            if (($this->day >= 21 && $this->month == 5) || ($this->day <= 20 && $this->month == 6) )
            {
                $this->setSign("Gêmeos");
                $this->setImage("https://d1ge7ke712cv9s.cloudfront.net/zodiac/zodiac_gemini_icon_138002.png");
            }

            if (($this->day >= 21 && $this->month == 6) || ($this->day <= 22 && $this->month == 7) )
            {
                $this->setSign("Câncer");
                $this->setImage("https://d1ge7ke712cv9s.cloudfront.net/zodiac/zodiac_cancer_icon_136004.png");
            }

            if (($this->day >= 23 && $this->month == 7) || ($this->day <= 22 && $this->month == 8) )
            {
                $this->setSign("Leão");
                $this->setImage("https://d1ge7ke712cv9s.cloudfront.net/zodiac/zodiac_leo_icon_138001.png");
            }

            if (($this->day >= 23 && $this->month == 8) || ($this->day <= 22 && $this->month == 9) )
            {
                $this->setSign("Virgem");
                $this->setImage("https://d1ge7ke712cv9s.cloudfront.net/zodiac/zodiac_virgo_icon_137001.png");
            }

            if (($this->day >= 23 && $this->month == 9) || ($this->day <= 22 && $this->month == 10) )
            {
                $this->setSign("Libra");
                $this->setImage("https://d1ge7ke712cv9s.cloudfront.net/zodiac/zodiac_libra_icon_136003.png");
            }

            if (($this->day >= 23 && $this->month == 10) || ($this->day <= 21 && $this->month == 11) )
            {
                $this->setSign("Escorpião");
                $this->setImage("https://d1ge7ke712cv9s.cloudfront.net/zodiac/zodiac_scorpio_icon_136002.png");
            }

            if (($this->day >= 22 && $this->month == 11) || ($this->day <= 21 && $this->month == 12) )
            {
                $this->setSign("Sagitário");
                $this->setImage("https://d1ge7ke712cv9s.cloudfront.net/zodiac/zodiac_sagittarius_icon_135002.png");
            }

            if (($this->day >= 22 && $this->month == 12) || ($this->day <= 20 && $this->month == 1) )
            {
                $this->setSign("Capricórnio");
                $this->setImage("https://d1ge7ke712cv9s.cloudfront.net/zodiac/zodiac_capricorn_icon_135003.png");
            }

        } catch (\Exception $e)
        {
            echo $e->getMessage();
        }

        return $this->getZodiac();
    }

    /**
     * @return array
     */
    private function getZodiac(): array
    {
        return [
            'sign' => $this->getSign(),
            'signImg' => $this->getImage()
        ];
    }

}
