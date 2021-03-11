<?php

namespace App\Controller;

use App\Repository\TarotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TarotController extends AbstractController
{

    private $dao;

    public function __construct()
    {
        $this->dao = new TarotRepository();
    }

    /**
     * @Route("/tarot", name="tarot")
     */
    public function index()
    {
        return $this->render('tarot/index.html.twig');
    }

    /**
     * @Route("/tarot/view", name="viewAll")
     *
     */
       public function viewAll(): Response
       {

           $this->render('tarot/index.html.twig', [

           ]);

       }
}
