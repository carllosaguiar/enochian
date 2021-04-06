<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Entity\User;
use App\Form\ProfileType;
use App\Service\ProfileService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    private $profile;

    public function __construct(ProfileService $profile)
    {
        $this->profile = $profile;
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function index(): Response
    {
        $profile = $this->profile->viewProfile();

        return $this->render('profile/index.html.twig', [
            'profile' => $profile
        ]);
    }

    /**
     * @Route("/profile/create", name="create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $profile = new Profile();
        $form = $this->createForm(ProfileType::class, $profile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($profile);
            $em->flush();

            return $this->redirectToRoute('profile');
        }

        return $this->render('profile/new.html.twig');
    }
}
