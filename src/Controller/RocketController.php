<?php

namespace App\Controller;

use App\Entity\Rocket;
use App\Form\RocketType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rocket", name="rocket_")
 */

class RocketController extends AbstractController
{
    /**
     * @Route("/new", name="new")
     */
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $rocket = new Rocket();
        $form = $this->createForm(RocketType::class, $rocket);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $rocket->setStartedAt(new \DateTimeImmutable());
            $rocket->addUser($this->getUser());
            $em->persist($rocket);
            $em->flush();
            $this->addFlash('success', 'Add a rocket');
            return $this->redirectToRoute('home');
        }


        return $this->render('rocket/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/team-building", name="building")
     */
    public function building(Rocket $rocket): Response
    {
        $rocketSkills = $rocket->getSkills();

        return $this->render('rocket/builder.html.twig', [
           'rocket' => $rocket,
        ]);
    }
}
