<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Controller;

final class CommentaireController extends AbstractController
{
    #[Route('/commentaire', name: 'app_commentaire')]
    public function index(CommentaireRepository $commentaireRepository): Response
    {
        $commentaires = $commentaireRepository->findAll();
        return $this->render('commentaire/index.html.twig', [
            'commentaires' => $commentaires,
        ]);
    }

    #[Route('/commentaire/create', name: 'commentaire_create')]
    public function create(EntityManagerInterface $entityManager): Response 
    {
        $commentaire = new commentaire();
        $commentaire->setName("MMMMMMMMMMMMH J'AI PLEURE SUR LE POULET");
        $commentaire->setDescription("C'était juste divin, j'ai pas les mots, c'est comme manger le Soleil ! C'était hot mais délicieux !");
        $commentaire->setBurger($burger);
        
        $entityManager->persist($commentaire);
        $entityManager->flush();

        return new Response('Le commentaire a bien été écrit');
    }

    public function findAll():Response
    {
        return $this->render('commentaire/findAll.html.twig', [
            'controller_name' => 'CommentaireController',
        ]);
    }
}
