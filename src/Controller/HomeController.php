<?php

namespace App\Controller;

use App\Entity\Formations;
use App\Entity\Service;
use App\Entity\Societe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
   
    #[Route('/', name: 'home_redirect')]
    public function redirectToLogin(): RedirectResponse
    {
        // Redirige automatiquement vers la page de login
        return $this->redirectToRoute('app_login');
    }
    #[Route('/home', name: 'app_home')]
    public function index(EntityManagerInterface $em): Response
    {
        $societe = $em->getRepository(Societe::class)->findOneBy([]);
        $services = $em->getRepository(Service::class)->findAll();
        $formations = $em->getRepository(Formations::class)->findAll();

        return $this->render('home/index.html.twig', [
            'societe' => $societe,
            'services' => $services,
            'formations' => $formations,

        ]);
    }
}
