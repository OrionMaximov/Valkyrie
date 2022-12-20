<?php

namespace App\Controller;

use App\Entity\BandeD;
use App\Entity\Comics;
use App\Entity\Mangas;
use App\Entity\Panier;
use App\Form\AddToCartType;
use App\Manager\CartManager;
use App\Repository\PanierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class ProduitController
 * @package App\Controller
 */

class ProduitController extends AbstractController
{
        /**
     * @Route("/produit/{id}", name="produit.detail")
     */
    public function detail(Panier $panier, Request $request, CartManager $cartManager): Response
    {
        $form = $this->createForm(AddToCartType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $item = $form->getData();
            $item->setProduit($panier);
            
            $cart = $cartManager->getCurrentCart();
            $cart
                ->addItem($item)
                ->setUpdateAt(new \DateTime());

            $cartManager->save($cart);
           
            return $this->redirectToRoute('produit.detail', ['id' => $panier->getId()]);
        }

        return $this->render('produit/detail.html.twig', [
            'panier' => $panier,
            'form' => $form->createView()
        ]);
    }
}
