<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Form\ProfileType;
use App\Service\FileUploader;
use App\Service\ProfileService;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\File;


class ProfileController extends AbstractController
{
    private ProfileService $profile;
    private Security $security;

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
     * @param FileUploader $fileUploader
     * @return Response
     * @throws NonUniqueResultException
     */
    public function create(Request $request, FileUploader $fileUploader): Response
    {

        $profile = new Profile();
        $form = $this->createForm(ProfileType::class, $profile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $brochureFile = $form->get('image')->getData();

            if ($brochureFile) {
                $brochureFileName = $fileUploader->upload($brochureFile);
                $profile->setImage($brochureFileName);
            }

            $date = $form->get('birthDate')->getViewData();

            $dateFormat = \DateTime::createFromFormat('Y-m-d', $date);
            $day = $dateFormat->format('d');
            $month = $dateFormat->format('m');

            $resultZodiac = $this->profile->generateZodiac($day, $month);
            $profile->setZodiac($resultZodiac);

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
     * @param FileUploader $fileUploader
     * @return Response
     * @throws NonUniqueResultException
     */
    public function editProfile(Request $request, FileUploader $fileUploader): Response
    {
        $userProfile = $this->profile->getUserProfile();

        $form = $this->createForm(ProfileType::class, $userProfile);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $brochureFile = $form->get('image')->getData();

            if ($brochureFile) {
                $brochureFileName = $fileUploader->upload($brochureFile);
                $userProfile->setImage($brochureFileName);
            }
                $date = $form->get('birthDate')->getViewData();

                $dateFormat = \DateTime::createFromFormat('Y-m-d', $date);
                $day = $dateFormat->format('d');
                $month = $dateFormat->format('m');

                $resultZodiac = $this->profile->generateZodiac($day, $month);
                $userProfile->setZodiac($resultZodiac);

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
