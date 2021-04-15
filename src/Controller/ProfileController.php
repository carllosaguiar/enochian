<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Form\ProfileType;
use App\Service\ProfileService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class ProfileController extends AbstractController
{
    private $profile;
    private $security;

    public function __construct(ProfileService $profile, Security $security)
    {
        $this->profile = $profile;
        $this->security = $security;
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function index(): Response
    {
        $profile = $this->profile->getUserProfile();

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
        $form = $this->createForm(ProfileType::class, $profile, [
            'action' => $this->generateUrl('create'),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $request->files->get('profile')['my_file'];

            $uploads_directory = $this->getParameter('uploads_directory');

            $filename = md5(uniqid()) . '.' . $file->guessExtension();

            $file->move($uploads_directory, $filename);

            $em = $this->getDoctrine()->getManager();
            $user = $this->security->getUser();
            $profile->setImage($filename);
            $profile->setUser($user);
            $em->persist($profile);
            $em->flush();

            return $this->redirectToRoute('profile');
        }

        $userProfile = $this->profile->getUserProfile();

        return $this->render('profile/new.html.twig', [
            'form_profile' => $form->createView(),
            'userProfile' => $userProfile
        ]);
    }
}
