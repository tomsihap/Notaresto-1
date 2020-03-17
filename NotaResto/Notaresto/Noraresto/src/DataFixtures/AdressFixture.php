<?php

namespace App\DataFixtures;
use App\Entity\Adress;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
class AdressFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for($i=0;$i<51;$i++)
        {
            $adress = new Adress;
            $adress->setZip(intval($faker->postcode));
            $adress->setName($faker->city);
            $manager->persist($adress);
        }


        $manager->flush();
    }
}
