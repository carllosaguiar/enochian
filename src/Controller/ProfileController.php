<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Form\ProfileType;
use App\Service\ProfileService;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class ProfileController extends AbstractController
{
    private $profile;
    private $security;

    /**
     * ProfileController constructor.
     * @param ProfileService $profile
     * @param Security $security
     */
    public function __construct(ProfileService $profile, Security $security)
    {
        $this->profile = $profile;
        $this->security = $security;
    }


    /**
     * @Route("/profile/create", name="create")
     * @param Request $request
     * @return Response
     * @throws NonUniqueResultException
     */
    public function create(Request $request): Response
    {

        $profile = new Profile();
        $form = $this->createForm(ProfileType::class, $profile);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $request->files->get('profile')['my_file'];

            $uploads_directory = $this->getParameter('uploads_directory');

            $filename = md5(uniqid()) . '.' . $file->guessExtension();

            $file->move($uploads_directory, $filename);

            $profile->setImage($filename);

            $em = $this->getDoctrine()->getManager();
            $user = $this->security->getUser();
            $profile->setUser($user);
            $em->persist($profile);
            $em->flush();

            $this->addFlash('success', "Perfil Criado!");

            return $this->redirectToRoute('create');
        }

        $userProfile = $this->profile->getUserProfile();

        return $this->render('profile/new.html.twig', [
            'form_profile' => $form->createView(),
            'userProfile' => $userProfile
        ]);
    }

    /**
     * @Route ("/profile/{id}/edit", name="update")
     * @param Request $request
     * @return Response
     * @throws NonUniqueResultException
     */
    public function editProfile(Request $request): Response
    {
        $userProfile = $this->profile->getUserProfile();

        $profile = new Profile();

        $form = $this->createForm(ProfileType::class, $userProfile);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {

            if($request->files->get('profile')['my_file'] != null)
            {
                $file = $request->files->get('profile')['my_file'];

                $uploads_directory = $this->getParameter('uploads_directory');

                $filename = md5(uniqid()) . '.' . $file->guessExtension();

                $file->move($uploads_directory, $filename);

                $profile->setImage($filename);

            }

            $updateUser = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($updateUser);
            $em->flush();

            $this->addFlash('success', "Perfil atualizado!");

            return $this->redirectToRoute('create');
        }

        return $this->render('profile/update.html.twig', [
            'form_profile' => $form->createView(),
            'userProfile' => $userProfile
        ]);
    }
}
