<?php

namespace App\Controller;

use App\Entity\Rocket;
use App\Form\RocketType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RocketController extends AbstractController
{
    /**
     * @Route("/rocket/new", name="rocket_new")
     */
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $rocket = new Rocket();
        $form = $this->createForm(RocketType::class, $rocket);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $rocket->setStartedAt(new \DateTimeImmutable());
            $em->persist($rocket);
            $em->flush();
            $this->addFlash('success', 'Add a rocket');
            return $this->redirectToRoute('home');
        }


        return $this->render('rocket/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
