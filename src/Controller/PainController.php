<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PainController extends AbstractController
{
    #[Route('/pain', name: 'app_pain')]
    public function index(PainRepository $painRepository): Response
    {
        $pains = $painRepository->findAll();
        return $this->render('pain/index.html.twig', [
            'controller_name' => 'PainController',
        ]);
    }
    public function findAll():Response
    {
        return $this->render('pain/findAll.html.twig', [
            'controller_name' => 'PainController',
        ]);
    }
}
