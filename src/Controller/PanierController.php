<?php

namespace App\Controller;

use App\Repository\PanierRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="app_panier")
     */
    public function index(PanierRepository $panierRepository): Response
    {
        return $this->render('panier/panier.html.twig', [
            'panier' => $panierRepository->findAll(),
        ]);
    }
}
