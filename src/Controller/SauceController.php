<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Sauce;

final class SauceController extends AbstractController
{
    #[Route('/sauce', name: 'app_sauce')]
    public function index(SauceRepository $sauceRepository): Response
    {
        $sauces = $sauceRepository->findAll();
        return $this->render('sauce/index.html.twig', [
            'sauce' => $sauces,
        ]);
    }

    #[Route('/sauce/create', name: 'sauce_create')]
    public function create(EntityManagerInterface $entityManager): Response 
    {
        $sauce = new Sauce();
        $sauce->setName('Sauce Curry');
        $sauce->setDescription('Une sauce au curry asy');

        $entityManager->persist($sauce);
        $entityManager->flush();

        return new Response('La sauce a bien été créée !');
    }

    public function findAll():Response
    {
        return $this->render('sauce/findAll.html.twig', [
            'controller_name' => 'SauceController',
        ]);
    }
}
