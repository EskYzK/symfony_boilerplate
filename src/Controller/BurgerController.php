<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Burger;

#[Route('/burger', name: 'burger_')]
class BurgerController extends AbstractController
{
    #[Route('/liste', name: 'liste')]
    public function liste(BurgerRepository $burgerRepository): Response
    {
        $burgers = $burgerRepository->findAll();

        return $this->render('burger/liste_burger.html.twig', [
            'burgers' => $burgers,
        ]);
    }

    #[Route('/burger/show/{id}', name: 'detail')]
    public function detail(int $id, BurgerRepository $burgerRepository): Response
    {
        $burger = $burgerRepository->find($id);

        if (!$burger) {
            throw $this->createNotFoundException("Burger avec l'id $id introuvable.");
        }

        return $this->render('burger/detail.html.twig', [
            'burger' => $burger,
        ]);
    }

    #[Route('/create', name: 'create')]
    public function create(EntityManagerInterface $entityManager): Response
    {
        $burger = new Burger();
        $burger->setName('Krabby Patty');
        $burger->setPrice(4.99);
    
        $entityManager->persist($burger);
        $entityManager->flush();
    
        return new Response('Burger créé avec succès !');
    }
}