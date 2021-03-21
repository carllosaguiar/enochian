<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArcaneController extends AbstractController
{
    /**
     * @Route("/arcane", name="major")
     * @return Response
     */
    public function index(): Response
    {
        //call service to get all arcane in repository
        //$arcane = $this->arcaneService->findAllArcane();

        //get all Arcane
        return $this->render('arcane/index.html.twig');
    }

//    /**
//     * @Route("/arcane/{id}", name="show_arcane")
//     * @param Request $request
//     * @return Response
//     */
//    public function getArcaneById(Request $request): Response
//    {
//        $id = $request->get('id');
//        $arcane = $this->arcaneService->findArcaneById($id);
//        return $this->render('arcana/show.html.twig',[
//            'arcane' => $arcane
//        ]);
//    }
}
