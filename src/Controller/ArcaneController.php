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
    private ArcaneService $arcaneService;

    /**
     * ArcaneController constructor.
     * @param ArcaneService $arcaneService
     */
    public function __construct(ArcaneService $arcaneService)
    {
        $this->arcaneService = $arcaneService;
    }


    /**
     * @Route("/arcane/major", name="major")
     * @return Response
     */
    public function viewAllArcaneMajor(): Response
    {
        $arcanes = $this->arcaneService->getAllArcane();

        return $this->render('arcane/all_major.html.twig', [
            'arcanes' => $arcanes
        ]);
    }

    /**
     * @Route("/arcane/major/{id}", name="arcane")
     * @param Request $request
     * @return Response
     * @throws NonUniqueResultException
     */
    public function viewArcaneMajor(Request $request): Response
    {
        $id = $request->get('id');
        $arcane =  $this->arcaneService->getArcaneById($id);

        return $this->render('arcane/major.html.twig', [
            'arcane' => $arcane
        ]);
    }

    /**
     * @Route("/arcane/minor", name="minor")
     * @return Response
     */
    public function viewAllMinorArcane():Response
    {
        $arcanes = $this->arcaneService->getAllMinorArcane();

        return $this->render('arcane/all_minor.html.twig', [
            'arcanes' => $arcanes
        ]);
    }

    /**
     * @Route("/arcane/minor/{id}", name="minor_arcane")
     * @param Request $request
     * @return Response
     */
    public function viewMinorArcane(Request $request):Response
    {
        $id = $request->get('id');
        $arcane = $this->arcaneService->getMinorArcaneById($id);

        return $this->render('arcane/minor.html.twig', [
            'arcane' => $arcane
        ]);
    }
}