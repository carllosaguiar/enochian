<?php

namespace App\Entity;

use App\Repository\ArcaneMinorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArcaneMinorRepository::class)
 */
class ArcaneMinor
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
    private ?string $moderatorAttribute;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $transcendentAxiom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $variousAssociations;

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

    public function getModeratorAttribute(): ?string
    {
        return $this->moderatorAttribute;
    }

    public function setModeratorAttribute(string $moderatorAttribute): self
    {
        $this->moderatorAttribute = $moderatorAttribute;

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

    public function getVariousAssociations(): ?string
    {
        return $this->variousAssociations;
    }

    public function setVariousAssociations(string $variousAssociations): self
    {
        $this->variousAssociations = $variousAssociations;

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
