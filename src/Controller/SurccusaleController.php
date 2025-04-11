<?php

namespace App\Controller;

use App\Entity\Surccusale;
use App\Form\SurccusaleType;
use App\Repository\SurccusaleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/surccusale')]
final class SurccusaleController extends AbstractController
{
    #[Route(name: 'app_surccusale_index', methods: ['GET'])]
    public function index(SurccusaleRepository $surccusaleRepository): Response
    {
        return $this->render('surccusale/index.html.twig', [
            'surccusales' => $surccusaleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_surccusale_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $surccusale = new Surccusale();
        $form = $this->createForm(SurccusaleType::class, $surccusale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($surccusale);
            $entityManager->flush();

            return $this->redirectToRoute('app_surccusale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('surccusale/new.html.twig', [
            'surccusale' => $surccusale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_surccusale_show', methods: ['GET'])]
    public function show(Surccusale $surccusale): Response
    {
        return $this->render('surccusale/show.html.twig', [
            'surccusale' => $surccusale,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_surccusale_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Surccusale $surccusale, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SurccusaleType::class, $surccusale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_surccusale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('surccusale/edit.html.twig', [
            'surccusale' => $surccusale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_surccusale_delete', methods: ['POST'])]
    public function delete(Request $request, Surccusale $surccusale, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$surccusale->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($surccusale);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_surccusale_index', [], Response::HTTP_SEE_OTHER);
    }
}
