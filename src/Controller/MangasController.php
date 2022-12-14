<?php

namespace App\Controller;

use App\Entity\Mangas;
use Gumlet\ImageResize;
use App\Form\MangasType;
use App\Repository\MangasRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/mangas")
 */
class MangasController extends AbstractController
{
    /**
     * @Route("/", name="app_mangas_index", methods={"GET"})
     */
    public function index(MangasRepository $mangasRepository): Response
    {   
        
        return $this->render('mangas/index.html.twig', [
            'mangas' => $mangasRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_mangas_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MangasRepository $mangasRepository): Response
    {
        $manga = new Mangas();
        $form = $this->createForm(MangasType::class, $manga);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $mangasRepository->add($manga, true);
            
            
        }

        return $this->renderForm('mangas/new.html.twig', [
            'manga' => $manga,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_mangas_show", methods={"GET"})
     */
    public function show(Mangas $manga): Response
    {   
        $mode=false;
        if($manga->getQuantite() !== 0){
            $mode=true;
        }
       

           
            

           
        return $this->render('mangas/show.html.twig', [
            'manga' => $manga,
            'mode' => $mode,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_mangas_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Mangas $manga, MangasRepository $mangasRepository): Response
    {
        $form = $this->createForm(MangasType::class, $manga);
        $form->handleRequest($request);
        $mode=false;
        if ($form->isSubmitted() && $form->isValid()) {
            $mangasRepository->add($manga, true);
           
            return $this->redirectToRoute('app_mangas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mangas/edit.html.twig', [
            'manga' => $manga,
            'form' => $form,
           
        ]);
    }

    /**
     * @Route("/{id}", name="app_mangas_delete", methods={"POST"})
     */
    public function delete(Request $request, Mangas $manga, MangasRepository $mangasRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$manga->getId(), $request->request->get('_token'))) {
            $mangasRepository->remove($manga, true);
        }

        return $this->redirectToRoute('app_mangas_index', [], Response::HTTP_SEE_OTHER);
    }
}
