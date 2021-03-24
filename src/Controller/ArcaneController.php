<?php

namespace App\Controller;

use App\Service\ArcaneService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArcaneController extends AbstractController
{

    /**
     * @var ArcaneService
     */
    private $arcaneService;

    /**
     * ArcaneController constructor.
     * @param ArcaneService $arcaneService
     */
    public function __construct(ArcaneService $arcaneService)
    {
        $this->arcaneService = $arcaneService;
    }

    /**
     * @Route("/arcane", name="major")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('arcane/index.html.twig');
    }
}
