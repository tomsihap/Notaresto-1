<?php

namespace App\Controller;

use App\Entity\RestaurantPicture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/restaurant/picture")
 */
class RestaurantPictureController extends AbstractController
{
    /**
     * @Route("", name="restaurant_picture")
     */
    public function index()
    {
        return $this->render('restaurant_picture/index.html.twig', [
            'controller_name' => 'RestaurantPictureController',
        ]);
    }
    /**
     * @Route("/show/{id}",name="restaurant_picture_show",methods={"GET"})
     */
    public function show(RestaurantPicture $restaurantPicture)
    {

    }
    /**
     * @Route("/delete/{id}",name="restaurant_picture_delete",methods={"DELETE"})
     */
    public function delete(RestaurantPicture $restaurantPicture, Request $request)
    {

    }
    /**
     * @Route("/edit/{id}",name="restaurant_picture_edit",methods={"GET","POST"})
     */
    public function edit(RestaurantPicture $restaurantPicture, Request $request)
    {

    }
    /**
     * @Route("/new",name="restaurant_picture_new",methods={"GET","POST"})
     */
    public function new(Request $request)
    {

    }
}
