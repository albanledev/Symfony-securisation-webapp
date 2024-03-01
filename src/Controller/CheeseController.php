<?php

namespace App\Controller;

use App\Entity\Cheese;
use App\Form\CheeseType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class CheeseController extends AbstractController
{
    #[Route('/', name: 'app_cheese')]
    public function index(EntityManagerInterface $em, Request $r, SluggerInterface $slugger): Response
    {
        $cheese = new Cheese();
        $form = $this->createForm(CheeseType::class, $cheese);
        $form->handleRequest($r);

        if($form->isSubmitted() && $form->isValid()){
            $slug = $slugger->slug($cheese->getName() . '-' . uniqid()); // slugify the title
            $cheese->setSlug($slug);

            $em->persist($cheese);
            $em->flush();
        }

        $cheeses = $em->getRepository(Cheese::class)->findAll();
        return $this->render('cheese/index.html.twig', [
            'cheeses' => $cheeses,
            'form' => $form->createView()
        ]);

    }

    #[Route('/show/{slug}', name: 'cheese_show')]
    public function show(Cheese $cheese)
    {
        return $this->render('cheese/show.html.twig', [
            'cheese' => $cheese
        ]);
    }

    #[Route('/delete/{id}', name: 'app_cheese_delete')]
    public function delete(Request $r, EntityManagerInterface $em, $id, Cheese $cheese)
    {
        if($this->isCsrfTokenValid('delete'.$cheese->getId(), $r->request->get('csrf'))){
            $em->remove($cheese);
            $em->flush();
        }

        return $this->redirectToRoute('app_cheese' );

    }

       #[Route('/edit/{slug}', name: 'app_cheese_edit')]
    public function edit(Request $r, EntityManagerInterface $em, Cheese $cheese)
    {
        $form = $this->createForm(CheeseType::class, $cheese);
        $form->handleRequest($r);

        if($form->isSubmitted() && $form->isValid()){
            $em->flush();
            return $this->redirectToRoute('app_cheese');
        }

        return $this->render('cheese/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }











}
