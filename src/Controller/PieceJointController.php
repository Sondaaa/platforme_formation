<?php

namespace App\Controller;

use App\Entity\Formations;
use App\Entity\PieceJoint;
use App\Form\PieceJointType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/piece/joint')]
class PieceJointController extends AbstractController
{
    #[Route('/', name: 'app_piece_joint_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $pieceJoints = $entityManager
            ->getRepository(PieceJoint::class)
            ->findAll();

        return $this->render('piece_joint/index.html.twig', [
            'piece_joints' => $pieceJoints,
        ]);
    }

    #[Route('/new', name: 'app_piece_joint_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger
    ): Response {
        $pieceJoint = new PieceJoint();
        $idFormation = $request->query->getInt('id_formation'); // returns 0 if missing

        if (!$idFormation) {
            throw $this->createNotFoundException('Formation ID missing.');
        }

        $formation = $entityManager->getRepository(Formations::class)->find($idFormation);
        if (!$formation) {
            throw $this->createNotFoundException('Formation not found');
        }
          
 $form = $this->createForm(PieceJointType::class, $pieceJoint, [
        'disable_formation' => true, // disables select
    ]);
        // Pre-select this formation in the entity
        $pieceJoint->setFormation($formation);

        $form = $this->createForm(PieceJointType::class, $pieceJoint, [
            'disable_formation' => true, // disables select but keeps selected value
        ]);

        $form = $this->createForm(PieceJointType::class, $pieceJoint, [
            'disable_formation' => true,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fichierFile = $form->get('fichier')->getData();

            if ($fichierFile) {
                $originalFilename = pathinfo($fichierFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $fichierFile->guessExtension();

                try {
                    $fichierFile->move(
                        $this->getParameter('attachments_directory'), // définir dans services.yaml
                        $newFilename
                    );
                } catch (FileException $e) {
                    // gérer l'exception si besoin
                }

                $pieceJoint->setFichier($newFilename);
            }
            $entityManager->persist($pieceJoint);
            $entityManager->flush();

            return $this->redirectToRoute('app_formations_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('piece_joint/new.html.twig', [
            'piece_joint' => $pieceJoint,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_piece_joint_show', methods: ['GET'])]
    public function show(PieceJoint $pieceJoint): Response
    {
        return $this->render('piece_joint/show.html.twig', [
            'piece_joint' => $pieceJoint,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_piece_joint_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PieceJoint $pieceJoint, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PieceJointType::class, $pieceJoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_piece_joint_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('piece_joint/edit.html.twig', [
            'piece_joint' => $pieceJoint,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_piece_joint_delete', methods: ['POST'])]
    public function delete(Request $request, PieceJoint $pieceJoint, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $pieceJoint->getId(), $request->request->get('_token'))) {
            $entityManager->remove($pieceJoint);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_piece_joint_index', [], Response::HTTP_SEE_OTHER);
    }
}
