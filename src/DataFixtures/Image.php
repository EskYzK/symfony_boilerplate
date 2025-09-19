<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Exemple d’URL d’images fictives (tu peux les changer ou en utiliser des vraies)
        $images = [
            'https://source.unsplash.com/600x400/?burger',
            'https://source.unsplash.com/600x400/?cheeseburger',
            'https://source.unsplash.com/600x400/?hamburger',
            'https://source.unsplash.com/600x400/?fast-food',
            'https://source.unsplash.com/600x400/?veggie-burger',
            'https://source.unsplash.com/600x400/?chicken-burger',
        ];

        $burgers = $manager->getRepository(Burger::class)->findAll();

        foreach ($burgers as $burger) {
            $nbImages = rand(1, 3); // Chaque burger a entre 1 et 3 images

            for ($i = 0; $i < $nbImages; $i++) {
                $image = new Image();
                $url = $images[array_rand($images)];
                $image->setUrl($url);
                $image->setAlt('Image de ' . $burger->getName());
                $image->setBurger($burger);

                $manager->persist($image);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            BurgerFixtures::class,
        ];
    }
}
