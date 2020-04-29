<?php

namespace App\Controller\Admin;

use App\Entity\Concert;
use App\Form\Admin\ConcertType;
use App\Repository\ConcertRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/concert")
 */
class ConcertController extends AbstractController
{
    /**
     * @Route("/", name="admin_concert_index", methods={"GET"})
     */
    public function index(ConcertRepository $concertRepository): Response
    {
        return $this->render('admin/concert/index.html.twig', [
            'concerts' => $concertRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_concert_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $concert = new Concert();
        $form = $this->createForm(ConcertType::class, $concert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($concert);
            $entityManager->flush();

            return $this->redirectToRoute('admin_concert_index');
        }

        return $this->render('admin/concert/new.html.twig', [
            'concert' => $concert,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_concert_show", methods={"GET"})
     */
    public function show(Concert $concert): Response
    {
        return $this->render('admin/concert/show.html.twig', [
            'concert' => $concert,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_concert_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Concert $concert): Response
    {
        $form = $this->createForm(ConcertType::class, $concert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_concert_index');
        }

        return $this->render('admin/concert/edit.html.twig', [
            'concert' => $concert,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_concert_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Concert $concert): Response
    {
        if ($this->isCsrfTokenValid('delete'.$concert->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($concert);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_concert_index');
    }
}
