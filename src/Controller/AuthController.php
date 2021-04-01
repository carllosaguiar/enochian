<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Security\User;

class AuthController extends AbstractController
{

    /**
     * @Route("/auth", name="form_login")
     * @return Response
     */
    public function login(): Response
    {
        return $this->render('auth/login.html.twig');
    }

    /**
     * @Route("/auth/access", name="access")
     * @param Request $request
     * @return Response
     */
    public function tryAccess(Request $request): Response
    {
        return $this->render('auth/register.html.twig');
    }

    /**
     * @Route("/auth/register", name="form-register")
     * @return Response
     */
    public function register(): Response
    {
        return $this->render('auth/register.html.twig');
    }
}
