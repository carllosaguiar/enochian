<?php


namespace App\Entity;


class Tarot
{
    private $name;
    private $image;
    private $description;
    private $letter;
    private $spiritualPlane;
    private $mentalPlane;
    private $physicalPlane;
    private $transcendentAxiom;
    private $astrologicalAssociation;
    private $inGeneral;
    private $right;
    private $revers;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLetter()
    {
        return $this->letter;
    }

    /**
     * @param mixed $letter
     */
    public function setLetter($letter): void
    {
        $this->letter = $letter;
    }

    /**
     * @return mixed
     */
    public function getSpiritualPlane()
    {
        return $this->spiritualPlane;
    }

    /**
     * @param mixed $spiritualPlane
     */
    public function setSpiritualPlane($spiritualPlane): void
    {
        $this->spiritualPlane = $spiritualPlane;
    }

    /**
     * @return mixed
     */
    public function getMentalPlane()
    {
        return $this->mentalPlane;
    }

    /**
     * @param mixed $mentalPlane
     */
    public function setMentalPlane($mentalPlane): void
    {
        $this->mentalPlane = $mentalPlane;
    }

    /**
     * @return mixed
     */
    public function getPhysicalPlane()
    {
        return $this->physicalPlane;
    }

    /**
     * @param mixed $physicalPlane
     */
    public function setPhysicalPlane($physicalPlane): void
    {
        $this->physicalPlane = $physicalPlane;
    }

    /**
     * @return mixed
     */
    public function getTranscendentAxiom()
    {
        return $this->transcendentAxiom;
    }

    /**
     * @param mixed $transcendentAxiom
     */
    public function setTranscendentAxiom($transcendentAxiom): void
    {
        $this->transcendentAxiom = $transcendentAxiom;
    }

    /**
     * @return mixed
     */
    public function getAstrologicalAssociation()
    {
        return $this->astrologicalAssociation;
    }

    /**
     * @param mixed $astrologicalAssociation
     */
    public function setAstrologicalAssociation($astrologicalAssociation): void
    {
        $this->astrologicalAssociation = $astrologicalAssociation;
    }

    /**
     * @return mixed
     */
    public function getInGeneral()
    {
        return $this->inGeneral;
    }

    /**
     * @param mixed $inGeneral
     */
    public function setInGeneral($inGeneral): void
    {
        $this->inGeneral = $inGeneral;
    }

    /**
     * @return mixed
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * @param mixed $right
     */
    public function setRight($right): void
    {
        $this->right = $right;
    }

    /**
     * @return mixed
     */
    public function getRevers()
    {
        return $this->revers;
    }

    /**
     * @param mixed $revers
     */
    public function setRevers($revers): void
    {
        $this->revers = $revers;
    }



}