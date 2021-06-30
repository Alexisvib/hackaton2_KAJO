<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\RocketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
 * @Route("/", name="home")
 */
    public function index(RocketRepository $rocketRepository): Response
    {
        $rockets = $rocketRepository->findAll();
        return $this->render('home/index.html.twig', [
            'rockets' => $rockets
        ]);
    }

    /**
     * @Route("/InProgress", name="InProgress")
     */
    public function InProgress(RocketRepository $rocketRepository): Response
    {
        $rocket = $rocketRepository->findOneBy(['title' => 'Project Website of mr Chatelain']);
        return $this->render('home/inProgress.html.twig', [
            'rocket' => $rocket
        ]);
    }



    /**
     * @Route("/refus", name="refus")
     */
    public function refus(): Response
    {
        $this->addFlash('danger', 'You have Rejected the Project ! ');
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/accept", name="accept")
     */
    public function accept(): Response
    {
        $this->addFlash('success', 'You have join a Rocket, Congratulation ! ');
        return $this->redirectToRoute('home');
    }



}
