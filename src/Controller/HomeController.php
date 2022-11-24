<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            
        ]);
    }

    /**
     * @Route("/cgu", name="cgu")
     */
    public function indexCgu(): Response
    {
        return $this->render('home/cgu.html.twig', [
            
        ]);
    }

    /**
     * @Route("/footer", name="footer")
     */
    public function indexFooter(): Response
    {
        return $this->render('home/footer.html.twig', [
            
        ]);
    }
}
