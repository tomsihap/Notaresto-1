<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');
        for($i=0;$i<50;$i++)
        {
            $restaurant = new Restaurant;
            $restaurant->setDescription($faker->text);
            $restaurant->setName($faker->name);
            
            
        }

        $manager->flush();
    }
}
