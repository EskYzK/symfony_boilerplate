<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Commentaire extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $auteurs = ['Alice', 'Bob', 'Charlie', 'Diane'];
        $messages = [
            'Excellent burger, très savoureux !',
            'Trop gras à mon goût, mais bonne cuisson.',
            'Je le recommande vivement.',
            'Pas assez chaud à la livraison.',
            'Un classique indémodable !',
        ];

        // On récupère tous les burgers créés précédemment
        $burgers = $manager->getRepository(Burger::class)->findAll();

        foreach ($burgers as $burger) {
            $nombreCommentaires = rand(1, 3); // 1 à 3 commentaires par burger

            for ($i = 0; $i < $nombreCommentaires; $i++) {
                $commentaire = new Commentaire();
                $commentaire->setContent($messages[array_rand($messages)]);
                $commentaire->setAuthor($auteurs[array_rand($auteurs)]);
                $commentaire->setCreatedAt(new \DateTimeImmutable(sprintf('-%d days', rand(0, 30))));
                $commentaire->setNote(rand(3, 5));
                $commentaire->setBurger($burger);

                $manager->persist($commentaire);
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
