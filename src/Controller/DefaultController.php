<?php

namespace App\Controller; // ✅ Namespace correct

use App\Entity\Societe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $em): Response
    {
        $societe = $em->getRepository(Societe::class)->findOneBy([]); 

        return $this->render('home/index.html.twig', [
            'societe' => $societe,
        ]);
    }
}
