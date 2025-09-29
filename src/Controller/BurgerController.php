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
    public function liste(): Response
    {
        $burgers = [
            [
                'id' => 1,
                'name' => 'Cheeseburger',
                'description' => "Un burger",
                'price' => 8.99,
                'image' => 'cb.jpg'
            ],
            [
                'id' => 2,
                'name' => 'Bacon Burger',
                'description' => "Miam",
                'price' => 10.99,
                'image' => 'bb.jpg'
            ],
            [
                'id' => 3,
                'name' => 'Veggie Burger',
                'description' => "Cool",
                'price' => 9.99,
                'image' => 'vb.jpg'
            ],
        ];
 
        return $this->render('burgers_list.html.twig', [
            'burgers' => $burgers,
        ]);
    }

    #[Route('/show/{id}', name: 'detail')]
    public function detail(int $id): Response
    {
        $burgers = [
            1 => [
                'name' => 'Cheeseburger',
                'description' => 'Un délicieux cheeseburger avec du cheddar fondant.',
                'price' => 5.99,
                'image' => 'cb.jpg'
            ],
            2 => [
                'name' => 'Bacon Burger',
                'description' => 'Burger avec bacon croustillant et sauce BBQ.',
                'price' => 6.99,
                'image' => 'bb.jpg'
            ],
            3 => [
                'name' => 'Veggie Burger',
                'description' => 'Burger végétarien avec galette de légumes maison.',
                'price' => 5.49,
                'image' => 'vb.jpg'
            ]
        ];

    
        $burger = $burgers[$id];

        return $this->render('burger/detail.html.twig', [
            'burger' => $burger
        ]);
    }

    #[Route('/burger', name: 'burger_index')]
    public function index(BurgerRepository $burgerRepository): Response
    {
        $burgers = $burgerRepository->findAll();
        return $this->render('burger/index.html.twig', [
            'burger' => $burgers,
        ]);
    }

    #[Route('/burger/create', name: 'burger_create')]
    public function create(EntityManagerInterface $entityManager): Response
    {
        $burger = new Burger();
        $burger->setName('Krabby Patty');
        $burger->setPrice(4.99);
    
        $entityManager->persist($burger);
        $entityManager->flush();
    
        return new Response('Burger créé avec succès !');
    }
    public function findAll():Response
    {
        return $this->render('burger/findAll.html.twig', [
            'controller_name' => 'BurgerController',
        ]);
    }
}