<?php

namespace App\Controller;

use App\Entity\Societe;
use App\Form\Societe3Type;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/societe')]
class SocieteController extends AbstractController
{
    #[Route('/', name: 'app_societe_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $societes = $entityManager
            ->getRepository(Societe::class)
            ->findAll();

        return $this->render('societe/index.html.twig', [
            'societes' => $societes,
        ]);
    }

    #[Route('/new', name: 'app_societe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $societe = new Societe();
        $form = $this->createForm(Societe3Type::class, $societe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($societe);
            $entityManager->flush();

            return $this->redirectToRoute('app_societe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('societe/new.html.twig', [
            'societe' => $societe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_societe_show', methods: ['GET'])]
    public function show(Societe $societe): Response
    {
        return $this->render('societe/show.html.twig', [
            'societe' => $societe,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_societe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Societe $societe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Societe3Type::class, $societe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_societe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('societe/edit.html.twig', [
            'societe' => $societe,
            'form' => $form,
        ]);
    }

    // #[Route('/{id}', name: 'app_societe_delete', methods: ['POST'])]
    // public function delete(Request $request, Societe $societe, EntityManagerInterface $entityManager): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$societe->getId(), $request->request->get('_token'))) {
    //         $entityManager->remove($societe);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('app_societe_index', [], Response::HTTP_SEE_OTHER);
    // }
    #[Route('/{id}/delete', name: 'app_societe_delete', methods: ['GET'])]
    public function delete(Societe $societe, EntityManagerInterface $em): Response
    {
        $em->remove($societe);
        $em->flush();

        return $this->redirectToRoute('app_societe_index');
    }
}
