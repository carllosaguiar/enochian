<?php

namespace App\Controller;

use App\Entity\Cabala;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CabalaService;

class CabalaController extends AbstractController
{

    private $service;

    public function __construct(CabalaService $cabalaService)
    {
         $this->service = $cabalaService;
    }

    /**
     * @Route("/cabala", name="cabala")
     */
    public function index(): Response
    {
        return $this->render('cabala/index.html.twig', [
            'controller_name' => 'CabalaController',
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route ("/cabala", name="year_of_birth")
     */
    public function viewYearOfBirthCabal(Request $request): Response
    {
        $YearOfBirth = $request->get('year');
        $result = $this->service->findYearOfBirthCabala();
        $this->render('cabala/index.html.twig',[
            'year' => $result
        ]);
    }
}
