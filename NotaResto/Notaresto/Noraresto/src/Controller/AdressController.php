<?php

namespace App\Controller;

use AdressType;
use App\Entity\Adress;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdressController extends AbstractController
{
    /**
     * @Route("/adress", name="adress",methods="GET")
     */
    public function index()
    {
        return $this->render('adress/index.html.twig', [
            'controller_name' => 'AdressController',
        ]);
    }
    /**
     * @Route("/{id}", name="adress_show", methods={"GET"})
     */
    public function show(Adress $adress)
    {
        return $this->render('adress/show.html.twig', [
            'adress'=> $adress
        ]);                                     
    }
    /**
     * @Route("/new",name="adress_new",methods={"GET","POST"})
     */
    public function new(Request $request)
    {
        $adress = new Adress;
        $form = $this->createForm(AdressType::class,$adress);//au depart t'as mis Adress(class)
        $form->$this->handleRequest($request);
        if($form->isSubmitted()& $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adress);
            $entityManager->flush();
            $this->redirectToRoute('adress');
        }
        return $this->render('adress/new.html.twig',[
            'adress'=>$adress,
            'form'=>$form->createView()
        ]);
    }
    /**
     * @Route("/delete/{id}",name="adress_delete",methods={"DELETE"})
     */
    public function delete(Request $request, Adress $adress)
    {
        if ($this->isCsrfTokenValid('delete' . $adress->getId(), $request->request->get('_token'))) 
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($adress);
            $entityManager->flush();
        }
        $this->redirectToRoute('adress');
    }
    /**
     * @Route("/edit/{id}",name="adress_edit",methods={"GET","POST"})
     */
    public function edit(Adress $adress, Request $request) : Response
    {
        $form= $this->createForm(AdressType::class,$adress);
        $form->handleRequest($request);
        if($form->isValid() && $form->isSubmitted())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form);
            $entityManager->flush();
        }
        return $this->render('adress/edit.html.twig',[
            'form'=>$form->createView(),
            'adress'=>$adress
        ]);
    }
}
