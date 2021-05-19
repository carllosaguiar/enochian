<?php

namespace App\Entity;

use App\Repository\AxiomRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AxiomRepository::class)
 */
class Axiom
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $axiom;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getAxiom(): ?string
    {
        return $this->axiom;
    }

    /**
     * @param string $axiom
     * @return $this
     */
    public function setAxiom(string $axiom): self
    {
        $this->axiom = $axiom;

        return $this;
    }

    /**
     * @param array $axioms
     * @return string|null
     */
    public function randomAxiom(array $axioms): ?string
    {
        $axiom = array_rand($axioms, 1);
        return $axioms[$axiom]->getAxiom();
    }
}
