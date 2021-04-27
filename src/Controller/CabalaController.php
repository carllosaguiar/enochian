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

        if ($yearOfBirth->isSubmitted() && $yearOfBirth->isValid()) {
            $year = $yearOfBirth->get('birthCabala')->getData();
            $amountEvents = $yearOfBirth->get('amountEvents')->getData();

            $result = $this->service->serviceSetYearOfBirth($year, $amountEvents);

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
     * @return Response
     * @throws NonUniqueResultException
     */
    public function viewPersonalCabala(): Response
    {
        $userProfileCabala = $this->service->getPersonalCabala();
        $arcanes = $this->service->locatorArcanes();

        return $this->render('cabala/personal.html.twig', [
            'cabala' => $userProfileCabala,
            'arcanes' => $arcanes
        ]);
    }

    /**
     * @Route("/cabala/{id}/birth/edit", name="edit_birth_cabala")
     * @param Request $request
     * @return Response
     * @throws NonUniqueResultException
     */
    public function editBirthCabala(Request $request): Response
    {
        $userProfileCabala = $this->service->getPersonalCabala();

        $form = $this->createForm(BirthCabalaType::class, $userProfileCabala);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $updateUser = $form->getData();
            $em = $this->getDoctrine()->getManager();

//            dump($request);

            $birthCabala = $request->request->get('birth_cabala')['birthCabala'];
            $amountEvents = $request->request->get('birth_cabala')['amountEvents'];

            $result = $this->service->serviceSetYearOfBirth($birthCabala, $amountEvents);
            $userProfileCabala->setBirthCabala($result);
            $em->persist($updateUser);
            $em->flush();

            $this->addFlash('success', "Cabala do Ano atualizada!");

            return $this->redirectToRoute('personal_cabala');
        }

        return $this->render('cabala/index.html.twig', [
            'birthCabala' => $form->createView(),
            'cabala' => $userProfileCabala
        ]);

    }
}
