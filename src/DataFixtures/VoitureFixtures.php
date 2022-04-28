<?php

namespace App\DataFixtures;

use App\Entity\Personne;
use App\Entity\Voiture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class VoitureFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr');
        for ($i = 0; $i < 10; $i++) {
            $voiture = new Voiture();
            $voiture->setColor($faker->colorName);
            $voiture->setMarque("Marque $i");
            $voiture->setMatricule("Matricule$i");

            $manager->persist($voiture);
        }
        $manager->flush();
        $manager->flush();
    }
}
