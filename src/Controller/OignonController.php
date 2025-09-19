<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class OignonController extends AbstractController
{
    #[Route('/oignon', name: 'app_oignon')]
    public function index(OignonRepository $oignonRepository): Response
    {
        $oignons = $oignonRepository->findAll();
        return $this->render('oignon/index.html.twig', [
            'controller_name' => 'OignonController',
        ]);
    }

    public function findAll():Response
    {
        return $this->render('oignon/findAll.html.twig', [
            'controller_name' => 'OignonController',
        ]);
    }

    #[Route('/oignon/create', name: 'oignon_create')]
    public function create(EntityManagerInterface $entityManager): Response
    {
        $oignon = new Oignon();
        $oignon->setName('Oignon rouge');
    
        $entityManager->persist($oignon);
        $entityManager->flush();
    
        return new Response('Oignon créé avec succès !');
    }
}
