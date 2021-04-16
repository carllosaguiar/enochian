<?php

namespace App\Controller;

use App\Service\ArcaneService;
use Doctrine\ORM\NonUniqueResultException;
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
        $arcanes = $this->arcaneService->getAllArcane();

        return $this->render('arcane/index.html.twig', [
            'arcanes' => $arcanes
        ]);
    }

    /**
     * @Route ("/arcane/{id}", name="arcane")
     * @param Request $request
     * @return Response
     * @throws NonUniqueResultException
     */
    public function viewArcane(Request $request): Response
    {
        $id = $request->get('id');
        $arcane =  $this->arcaneService->getArcaneById($id);

        return $this->render('arcane/arcane.html.twig', [
            'arcane' => $arcane
        ]);
    }
}