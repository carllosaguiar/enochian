<?php

namespace App\Controller;

use App\Entity\Cabala;
use App\Form\Cabala\BirthCabalaType;
use App\Form\Cabala\EventDayType;
use App\Form\Cabala\FundamentalTonicType;
use App\Form\Cabala\InnerUrgencyType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CabalaService;
use Symfony\Component\Security\Core\Security;

class CabalaController extends AbstractController
{

    private $service;
    private $security;

    public function __construct(CabalaService $cabalaService, Security $security)
    {
         $this->service = $cabalaService;
         $this->security = $security;
    }

    /**
     * @Route("/cabala", name="cabala")
     */
    public function index(): Response
    {
        return $this->render('cabala/index.html.twig');
    }

    /**
     * @Route("/cabala/personal", name="personal_cabala")
     * @param Request $request
     * @return Response
     */
    public function personalCabala(Request $request): Response
    {
        $cabala = new Cabala();

        $birthCabala = $this->createForm(BirthCabalaType::class);
        $birthCabala->handleRequest($request);

        $innerUrgency = $this->createForm(InnerUrgencyType::class);
        $innerUrgency->handleRequest($request);

        $fundamentalTonic = $this->createForm(FundamentalTonicType::class);
        $fundamentalTonic->handleRequest($request);

        $tonicDay = $this->createForm(FundamentalTonicType::class);
        $tonicDay->handleRequest($request);

        $eventDay = $this->createForm(EventDayType::class);
        $eventDay->handleRequest($request);

        if ($birthCabala->isSubmitted() && $birthCabala->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $user = $this->security->getUser();
            $cabala->setUser($user);
            $em->persist($cabala);
            $em->flush();
        }

        return $this->render('cabala/personal.html.twig');
    }

}
