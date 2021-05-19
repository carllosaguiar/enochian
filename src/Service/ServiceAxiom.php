<?php


namespace App\Service;


use App\Entity\Axiom;
use App\Repository\AxiomRepository;

class ServiceAxiom
{

    private AxiomRepository $axiomRepository;

    public function __construct(AxiomRepository $axiomRepository)
    {
        $this->axiomRepository = $axiomRepository;
    }


    /**
     * @return string
     */
    public function serviceGetRandomAxiom(): string
    {
        $axiom = new Axiom();
        $axioms = $this->axiomRepository->findAll();
        return $axiom->randomAxiom($axioms);
    }

}