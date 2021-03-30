<?php


namespace App\Service;


use App\Repository\ArcaneRepository;

class LocatorArcane
{

    private $arcaneRepository;

    public function __construct(ArcaneRepository $arcaneRepository)
    {
        $this->arcaneRepository = $arcaneRepository;
    }

    /**
     * @param int $number
     * @return false|string
     */
    public function locatorArcane(int $number): string
    {
        return $this->arcaneRepository->locatorArcaneById($number);
    }

}