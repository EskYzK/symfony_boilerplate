<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Sauce extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $nomsSauces = [
            'Blanche',
            'Mayonnaise',
            'Ketchup',
            'Barbecue',
            'Biggy',
            'Andalouse'
        ];

        foreach ($nomsSauces as $key => $nomSauce) {
            $sauce = new Sauce();
            $sauce->setNom($nomSauce);
            $manager->persist($sauce);
            $this->addReference(self::SAUCE_REFERENCE . '_' . $key, $sauce);
        }

        $manager->flush();
    }
}
