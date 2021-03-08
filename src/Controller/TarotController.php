<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TarotController extends AbstractController
{
    /**
     * @Route("/tarot", name="tarot")
     */
    public function index()
    {
        return $this->render('tarot/index.html.twig');
    }
}
