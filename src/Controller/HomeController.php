<?php

namespace App\Controller;

use App\Repository\MangasRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(MangasRepository $mangasRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'mangas' => $mangasRepository->findAll(),
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
     * @Route("/about", name="about")
     */
    public function indexAbout(): Response
    {
        return $this->render('home/about.html.twig', [
            
        ]);
    }
    
    /**
     * @Route("/ageVerif", name="ageVerif")
     */
    public function verif(): Response
    {
        return $this->render('home/ageverif.html.twig', [
            
        ]);
    }
    
}
