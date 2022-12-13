<?php

namespace App\Controller;

use App\Entity\Panier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
        /**
     * @Route("/produit/{id}", name="produit.detail")
     */
    public function index(Panier $panier): Response
    {
        return $this->render('produit/detail.html.twig', [
            'panier' => $panier,
        ]);
    }
}
