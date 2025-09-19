<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Burger extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $burgers = [
            [
                'name' => 'Big Mac',
                'description' => 'Deux steaks hachés, sauce spéciale, laitue, fromage, cornichons et oignons sur un pain au sésame.',
                'price' => 5.90,
            ],
            [
                'name' => 'Whopper',
                'description' => 'Un steak grillé à la flamme, tomates, laitue, mayonnaise, ketchup, cornichons et oignons dans un pain moelleux.',
                'price' => 6.50,
            ],
            [
                'name' => 'Cheeseburger',
                'description' => 'Steak haché, fromage fondu, ketchup, moutarde, cornichons, oignons.',
                'price' => 2.50,
            ],
            [
                'name' => 'Royal Cheese',
                'description' => 'Un burger classique avec du fromage fondu, sauce et condiments.',
                'price' => 5.10,
            ],
            [
                'name' => 'McChicken',
                'description' => 'Filet de poulet pané, laitue croquante et sauce McChicken.',
                'price' => 5.30,
            ],
            [
                'name' => 'Veggie Burger',
                'description' => 'Galette végétarienne, légumes frais, sauce légère.',
                'price' => 5.90,
            ],
        ];
        
        foreach ($burgers as $data) {
            $burger = new Burger();
            $burger->setName($data['name']);
            $burger->setDescription($data['description']);
            $burger->setPrice($data['price']);

            $manager->persist($burger);
        }

        $manager->flush();
    }
}
