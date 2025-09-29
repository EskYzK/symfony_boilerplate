<?php

namespace App\DataFixtures;

use App\Entity\Burger;
use App\Entity\Image;
use App\Entity\Pain;
use App\Entity\Oignon;
use App\Entity\Sauce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Create Images
        $image1 = new Image();
        $image1->setPath('cb.jpg');
        $manager->persist($image1);

        $image2 = new Image();
        $image2->setPath('bb.jpg');
        $manager->persist($image2);

        $image3 = new Image();
        $image3->setPath('vb.jpg');
        $manager->persist($image3);

        // Create Pains
        $pain1 = new Pain();
        $pain1->setName('Pain brioché');
        $pain1->setDescription('Un pain moelleux et légèrement sucré.');
        $manager->persist($pain1);

        // Create Oignons
        $oignon1 = new Oignon();
        $oignon1->setName('Oignons caramélisés');
        $manager->persist($oignon1);

        // Create Sauces
        $sauce1 = new Sauce();
        $sauce1->setName('Sauce BBQ');
        $sauce1->setDescription('Une sauce barbecue fumée et sucrée.');
        $manager->persist($sauce1);

        // Create Burgers
        $burger1 = new Burger();
        $burger1->setName('Cheeseburger');
        $burger1->setPrice(599);
        $burger1->setAltText('Un délicieux cheeseburger');
        $burger1->setImage($image1);
        $burger1->setPain($pain1);
        $burger1->addOignon($oignon1);
        $burger1->addSauce($sauce1);
        $manager->persist($burger1);

        $burger2 = new Burger();
        $burger2->setName('Bacon Burger');
        $burger2->setPrice(699);
        $burger2->setAltText('Burger avec bacon croustillant');
        $burger2->setImage($image2);
        $burger2->setPain($pain1);
        $burger2->addOignon($oignon1);
        $burger2->addSauce($sauce1);
        $manager->persist($burger2);

        $burger3 = new Burger();
        $burger3->setName('Veggie Burger');
        $burger3->setPrice(549);
        $burger3->setAltText('Burger végétarien');
        $burger3->setImage($image3);
        $burger3->setPain($pain1);
        $manager->persist($burger3);

        $manager->flush();
    }
}
