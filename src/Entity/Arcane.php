<?php

namespace App\Entity;

use App\Repository\ArcaneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArcaneRepository::class)
 */
class Arcane
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="blob")
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $letter;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $spiritualPlane;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mentalPlane;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $physicalPlane;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transcendentAxiom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $astrologicalAssociation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $inGeneral;

    /**
     * @ORM\Column(type="string", name="`right`", length=255)
     */
    private $positiveRight;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reverse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLetter(): ?string
    {
        return $this->letter;
    }

    public function setLetter(string $letter): self
    {
        $this->letter = $letter;

        return $this;
    }

    public function getSpiritualPlane(): ?string
    {
        return $this->spiritualPlane;
    }

    public function setSpiritualPlane(string $spiritualPlane): self
    {
        $this->spiritualPlane = $spiritualPlane;

        return $this;
    }

    public function getMentalPlane(): ?string
    {
        return $this->mentalPlane;
    }

    public function setMentalPlane(string $mentalPlane): self
    {
        $this->mentalPlane = $mentalPlane;

        return $this;
    }

    public function getPhysicalPlane(): ?string
    {
        return $this->physicalPlane;
    }

    public function setPhysicalPlane(string $physicalPlane): self
    {
        $this->physicalPlane = $physicalPlane;

        return $this;
    }

    public function getTranscendentAxiom(): ?string
    {
        return $this->transcendentAxiom;
    }

    public function setTranscendentAxiom(string $transcendentAxiom): self
    {
        $this->transcendentAxiom = $transcendentAxiom;

        return $this;
    }

    public function getAstrologicalAssociation(): ?string
    {
        return $this->astrologicalAssociation;
    }

    public function setAstrologicalAssociation(string $astrologicalAssociation): self
    {
        $this->astrologicalAssociation = $astrologicalAssociation;

        return $this;
    }

    public function getInGeneral(): ?string
    {
        return $this->inGeneral;
    }

    public function setInGeneral(string $inGeneral): self
    {
        $this->inGeneral = $inGeneral;

        return $this;
    }

    public function getPositiveRight(): ?string
    {
        return $this->positiveRight;
    }

    public function setPositiveRight(string $positiveRight): self
    {
        $this->positiveRight = $positiveRight;

        return $this;
    }

    public function getReverse(): ?string
    {
        return $this->reverse;
    }

    public function setReverse(string $reverse): self
    {
        $this->reverse = $reverse;

        return $this;
    }
}
