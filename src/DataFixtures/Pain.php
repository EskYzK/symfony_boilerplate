<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Pain extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $nomsPains = [
            'Complet',
            'Italien',
            'Blanc',
            'Charbon'
        ];

        foreach ($nomsPains as $key => $nomPain) {
            $pain = new Pain();
            $pain->setNom($nomPain);
            $manager->persist($pain);
            $this->addReference(self::PAIN_REFERENCE . '_' . $key, $pain);
        }

        $manager->flush();
    }
}
