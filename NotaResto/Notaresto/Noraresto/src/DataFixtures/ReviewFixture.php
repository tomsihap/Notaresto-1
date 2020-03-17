<?php

namespace App\DataFixtures;

use App\Entity\Review;
use App\Repository\RestaurantRepository;
use App\Repository\ReviewRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;
class ReviewFixture extends Fixture implements DependentFixtureInterface
{
    private $restaurantrepository;
    private $reviewRepository;
    public function __construct(RestaurantRepository $restaurantrepository,ReviewRepository $reviewRepository)
    {
        $this->restaurantrepository = $restaurantrepository;
        $this->reviewRepository = $reviewRepository;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Faker\factory::create('fr_FR');
        for ($i = 0; $i < 1000; $i++){
        $review = new Review;
        $review->setDescription($faker->text(90));
        $review->setRating(rand(1,5));
        $review->setTitle($faker->word);
        $review->setRestaurant($this->restaurantrepository->find(rand(1,50)));
        $manager->persist($review);
        }


        $manager->flush();
        for ($i = 0; $i < 1500; $i++) {
            $review = new Review();
            $review->setDescription($faker->text(800));
            $review->setRating(rand(0, 5));
            $review->setParent($this->reviewRepository->find(rand(1, 1000))); // On cherche un ID entre 1 et 7000 (un commentaire initial)
            $review->setRestaurant($review->getParent()->getRestaurant()); // On récupère le restaurant de la review parente
            $manager->persist($review);
        }
        $manager->flush();
    }
    

    public function getDependencies()
    {
        return array(RestaurantFixture::class);
    }
}
