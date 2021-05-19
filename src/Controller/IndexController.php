<?php

namespace App\Controller;

use App\Service\ServiceAxiom;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{

    private ServiceAxiom $service;

    public function __construct(ServiceAxiom $serviceAxiom)
    {
        $this->service = $serviceAxiom;
    }

    public function index(): Response
    {
        $axioms = $this->service->serviceGetRandomAxiom();
        return $this->render('home/index.html.twig', [
            'axiom' => $axioms
        ]);
    }
}
