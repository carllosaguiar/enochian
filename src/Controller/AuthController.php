<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    /**
     * @Route("/auth", name="login")
     */
    public function login(): Response
    {
        return $this->render('auth/login.html.twig');
    }

    /**
     * @Route("/auth", name="register")
     * @param Request $request
     * @return Response
     */
    public function register(Request $request): Response
    {
        return $this->render('auth/register.html.twig');
    }

    /**
     * @Route("/auth", name="recovery")
     */
    public function recovery()
    {
        return $this->render('auth/recovery.html.twig');
    }
}
