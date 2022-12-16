<?php

namespace App\Controller;

use App\Entity\Comics;
use App\Form\ComicsType;
use App\Repository\ComicsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comics")
 */
class ComicsController extends AbstractController
{
    /**
     * @Route("/", name="app_comics_index", methods={"GET"})
     */
    public function index(ComicsRepository $comicsRepository): Response
    {
        return $this->render('comics/index.html.twig', [
            'comics' => $comicsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_comics_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ComicsRepository $comicsRepository): Response
    {
        $comic = new Comics();
        $form = $this->createForm(ComicsType::class, $comic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comicsRepository->add($comic, true);

            return $this->redirectToRoute('app_comics_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('comics/new.html.twig', [
            'comic' => $comic,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_comics_show", methods={"GET"})
     */
    public function show(Comics $comic): Response
    {
        $mode=false;
        if($comic->getQuantite() !== 0){
            $mode=true;
        }

        return $this->render('comics/show.html.twig', [
            'comic' => $comic,
            'mode' => $mode,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_comics_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Comics $comic, ComicsRepository $comicsRepository): Response
    {
        $form = $this->createForm(ComicsType::class, $comic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comicsRepository->add($comic, true);

            return $this->redirectToRoute('app_comics_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('comics/edit.html.twig', [
            'comic' => $comic,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_comics_delete", methods={"POST"})
     */
    public function delete(Request $request, Comics $comic, ComicsRepository $comicsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comic->getId(), $request->request->get('_token'))) {
            $comicsRepository->remove($comic, true);
        }

        return $this->redirectToRoute('app_comics_index', [], Response::HTTP_SEE_OTHER);
    }
}
