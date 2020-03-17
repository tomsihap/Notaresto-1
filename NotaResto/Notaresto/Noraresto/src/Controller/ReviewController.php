<?php

namespace App\Controller;

use App\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/review")
 */
class ReviewController extends AbstractController
{
    /**
     * @Route("/review", name="review")
     */
    public function index()
    {
        return $this->render('review/index.html.twig', [
            'controller_name' => 'ReviewController',
        ]);
    }
    /**
     * @Route("/{id}",name="review_show",methods={"GET"})
     */
    public function show(Review $review)
    {

    }
    /**
     * @Route("/show/{id}",name="review_edit",methods={"GET","POST"})
     */
    public function edit(Review $review, Request $request)
    {

    }
    /**
     * @Route("/delete/{id}",name="review_edit",methods={"GET","POST"})
     */
    public function delete(Review $review, Request $request)
    {

    }
    /**
     * @Route("/new/{id}",name="review_new",methods={"GET","POST"})
     */
    public function new(Request $request)
    {
        
    }
}
