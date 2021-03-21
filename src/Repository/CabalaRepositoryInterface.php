<?php


namespace App\Repository;


use App\Entity\Cabala;

interface CabalaRepositoryInterface
{
    public function findAllPersonalCabala(): Cabala;
}