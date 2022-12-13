<?php

namespace App\Controller;

use App\Entity\BandeD;
use App\Form\BandeDType;
use App\Repository\BandeDRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bande/d")
 */
class BandeDController extends AbstractController
{
    /**
     * @Route("/", name="app_bande_d_index", methods={"GET"})
     */
    public function index(BandeDRepository $bandeDRepository): Response
    {
        return $this->render('bande_d/index.html.twig', [
            'bande_ds' => $bandeDRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_bande_d_new", methods={"GET", "POST"})
     */
    public function new(Request $request, BandeDRepository $bandeDRepository): Response
    {
        $bandeD = new BandeD();
        $form = $this->createForm(BandeDType::class, $bandeD);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bandeDRepository->add($bandeD, true);

            return $this->redirectToRoute('app_bande_d_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bande_d/new.html.twig', [
            'bande_d' => $bandeD,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_bande_d_show", methods={"GET"})
     */
    public function show(BandeD $bandeD): Response
    {
        return $this->render('bande_d/show.html.twig', [
            'bande_d' => $bandeD,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_bande_d_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, BandeD $bandeD, BandeDRepository $bandeDRepository): Response
    {
        $form = $this->createForm(BandeDType::class, $bandeD);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bandeDRepository->add($bandeD, true);

            return $this->redirectToRoute('app_bande_d_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bande_d/edit.html.twig', [
            'bande_d' => $bandeD,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_bande_d_delete", methods={"POST"})
     */
    public function delete(Request $request, BandeD $bandeD, BandeDRepository $bandeDRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bandeD->getId(), $request->request->get('_token'))) {
            $bandeDRepository->remove($bandeD, true);
        }

        return $this->redirectToRoute('app_bande_d_index', [], Response::HTTP_SEE_OTHER);
    }
}
