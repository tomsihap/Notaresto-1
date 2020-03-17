<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use App\Repository\AdressRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;
class RestaurantFixture extends Fixture implements DependentFixtureInterface
{
    private $adressRepository;
    public function __construct(AdressRepository $adressRepository)
    {
        $this->adressRepository = $adressRepository;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 50; $i++) {
            $restaurant = new Restaurant;
            $restaurant->setDescription($faker->text);
            $restaurant->setName($faker->name);
            $restaurant->setAdress($this->adressRepository->find(rand(1,50)));
            $manager->persist($restaurant);

        $manager->flush();
        }
        
    }
    public function getDependencies()
    {
        return array(AdressFixture::class);
    }
}