<?php

namespace App\Controller;

use App\Entity\Restaurant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/restaurant")
 */
class RestaurantController extends AbstractController
{
    /**
     * @Route("", name="restaurant")
     */
    public function index()
    {
        return $this->render('restaurant/index.html.twig', [
            'controller_name' => 'RestaurantController',
        ]);
    }
    /**
     * @Route("/{id}",name="restaurant_show",methods={"GET"})
     */
    public function show(Restaurant $restaurant)
    {

    }
    /**
     * @Route("/new",name="restaurant_new",methods={"GET","POST"})
     */
    public function new(Request $request, Restaurant $restaurant)
    {

    }
    /**
     * @Route("/delete/{id}",name="restaurant_delete",methods="DELETE")
     */
    public function delete()
    {

    } 
    /**
     * @Route("/edit/{id}",name="restaurant_edit",methods="GET","POST")
     */
    public function edit()
    {
        
    }
}
