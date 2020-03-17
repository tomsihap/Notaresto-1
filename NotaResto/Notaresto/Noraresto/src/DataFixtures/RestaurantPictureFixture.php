<?php

namespace App\DataFixtures;

use App\Entity\RestaurantPicture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;
class RestaurantPictureFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $restaurantPicture = new RestaurantPicture;
        $restaurantPicture->setTitle($faker->word);
        $restaurantPicture->setFile($faker->imageUrl(300, 200, 'food')); //"https://loremflickr.com/g/320/240/food"
        $manager->persist($restaurantPicture);

        

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(RestaurantFixture::class);
    }
}
