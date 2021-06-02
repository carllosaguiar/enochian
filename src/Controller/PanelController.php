<?php

namespace App\Controller;

use App\Service\CabalaService;
use App\Service\ProfileService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanelController extends AbstractController
{

    private ProfileService $profile;
    private CabalaService $cabala;

    /**
     * ProfileController constructor.
     * @param ProfileService $profile
     * @param CabalaService $cabala
     */
    public function __construct(ProfileService $profile, CabalaService $cabala)
    {
        $this->profile = $profile;
        $this->cabala = $cabala;
    }

    /**
     * @Route("/panel", name="dashboard")
     * @return Response
     */
    public function dashboard(): Response
    {
        $zodiacs = $this->profile->getAllZodiac();
        $cabala = $this->cabala->getAllCabala();

        return $this->render('panel/dashboard.html.twig', [
            'zodiac' => $zodiacs,
            'cabala' => $cabala
        ]);
    }

    /**
     * @Route("/panel/personal", name="personal")
     * @return Response
     */
    public function personal(): Response
    {
        return $this->render('panel/personal.html.twig');
    }
}
