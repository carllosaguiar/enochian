<?php


namespace App\Repository;


use App\Entity\Arcane;

interface ArcaneRepositoryInterface
{

    public function findById(int $id): Arcane;
    public function findAllArcane(): Arcane;
    public function save(Arcane $arcane): void;
}