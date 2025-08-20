<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur; // ton entité
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
#[Route(path: '/', name: 'app_root')]
    #[Route(path: '/login', name: 'app_login')]
    public function login(Request $request, EntityManagerInterface $em): Response
    {
        $error = null;

        if ($request->isMethod('POST')) {
            $username = $request->request->get('username');
            $password = $request->request->get('password');

            // Vérifier dans la table utilisateur
            $user = $em->getRepository(Utilisateur::class)->findOneBy(['username' => $username]);

            if ($user && $user->getPassword() === $password) {
                // ⚠️ Ici tu devrais utiliser un encodeur (bcrypt, argon2id), mais pour test on garde simple
                $this->addFlash('success', 'Connexion réussie');
                return $this->redirectToRoute('app_home'); // page d'accueil après connexion
            } else {
                $error = "Nom d'utilisateur ou mot de passe incorrect";
            }
        }

        return $this->render('login/index.html.twig', [
            'error' => $error,
        ]);
    }
}
