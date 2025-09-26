<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Pain;

final class PainController extends AbstractController
{
    #[Route('/pain', name: 'app_pain')]
    public function index(PainRepository $painRepository): Response
    {
        $pains = $painRepository->findAll();
        return $this->render('pain/index.html.twig', [
            'pain' =>$pains,
        ]);
    }

    #[Route('/pain/create', name: 'pain_create')]
    public function create(EntityManagerInterface $entityManager): Response 
    {
        $pain = new Pain();
        $pain->setName('Pain aux graines');
        $pain->setDescription('Un pain aux graines');

        $entityManager->persist($pain);
        $entityManager->flush();

        return new Response('Le pain a bien été créé !');
    }

}
