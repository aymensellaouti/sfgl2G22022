<?php

namespace App\DataFixtures;

use App\Entity\Personne;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PersonneFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr');
        for ($i = 0; $i < 10; $i++) {
            $personne = new Personne();
            $personne->setAge($faker->numberBetween(18,65));
            $personne->setName($faker->firstName.' '.$faker->name);
            $manager->persist($personne);
        }
        $manager->flush();
        $manager->flush();
    }
}
