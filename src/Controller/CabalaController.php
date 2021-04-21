<?php

namespace App\Controller;

use App\Entity\Cabala;
use App\Form\Cabala\BirthCabalaType;
use App\Form\Cabala\EventDayType;
use App\Form\Cabala\FundamentalTonicType;
use App\Form\Cabala\InnerUrgencyType;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CabalaService;
use Symfony\Component\Security\Core\Security;

class CabalaController extends AbstractController
{

    private CabalaService $service;
    private Security $security;

    public function __construct(CabalaService $service, Security $security)
    {
         $this->service = $service;
         $this->security = $security;
    }

    /**
     * @Route("/cabala", name="create_cabala")
     * @param Request $request
     * @return Response
     */
    public function personalCabala(Request $request): Response
    {
        $cabala = new Cabala();
        $currentUser = $this->security->getUser();

        $yearOfBirth = $this->createForm(BirthCabalaType::class);
        $yearOfBirth->handleRequest($request);

        $innerUrgency = $this->createForm(InnerUrgencyType::class);
        $innerUrgency->handleRequest($request);

        $fundamentalTonic = $this->createForm(FundamentalTonicType::class);
        $fundamentalTonic->handleRequest($request);

        $tonicDay = $this->createForm(FundamentalTonicType::class);
        $tonicDay->handleRequest($request);

        $eventDay = $this->createForm(EventDayType::class);
        $eventDay->handleRequest($request);

        if ($yearOfBirth->isSubmitted() && $yearOfBirth->isValid())
        {
            $year = $yearOfBirth->get('birthCabala')->getData();
            $amountEvents = $yearOfBirth->get('amountEvents')->getData();

            $result = $this->cabala->serviceSetYearOfBirth($year, $amountEvents);

            $em = $this->getDoctrine()->getManager();
            $cabala->setUser($currentUser);
            $cabala->setBirthCabala($result);
            $em->persist($cabala);
            $em->flush();
        }
            return $this->render('cabala/index.html.twig', [
                'birthCabala' => $yearOfBirth->createView()
            ]);

    }

    /**
     * @Route("/cabala/personal", name="personal_cabala")
     * @param Request $request
     * @return Response
     * @throws NonUniqueResultException
     */
    public function viewPersonalCabala(Request $request): Response
    {
        $personalCabala = $this->service->getPersonalCabala();

        return $this->render('cabala/personal.html.twig', [
            'cabala' => $personalCabala
        ]);
    }

}
