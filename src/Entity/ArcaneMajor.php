<?php

namespace App\Entity;
use App\Repository\ArcaneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArcaneRepository")
 */
class ArcaneMajor
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
    private ?string $name;

    /**
     * @ORM\Column(type="blob")
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $letter;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $spiritualPlane;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $mentalPlane;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $physicalPlane;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $transcendentAxiom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $astrologicalAssociation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $inGeneral;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $favorable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $notFavorable;


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
        if($this->image !== null)
        {
            rewind($this->image);
            return stream_get_contents($this->image);
        }
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

    public function getFavorable(): ?string
    {
        return $this->favorable;
    }

    public function setFavorable(string $favorable): self
    {
        $this->favorable = $favorable;

        return $this;
    }

    public function getNotFavorable(): ?string
    {
        return $this->notFavorable;
    }

    public function setNotFavorable(string $notFavorable): self
    {
        $this->notFavorable = $notFavorable;

        return $this;
    }

}
