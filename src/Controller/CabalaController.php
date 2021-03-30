<?php

namespace App\Controller;

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
     * @Route("/cabala", name="index")
     */
    public function index(): Response
    {
        return $this->render('cabala/index.html.twig');
    }



}
