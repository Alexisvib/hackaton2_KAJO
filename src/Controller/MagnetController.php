<?php

namespace App\Controller;

use App\Repository\RocketRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MagnetController extends AbstractController
{
    /**
     * @Route("/machine", name="machine")
     */
    public function index(RocketRepository $rocketRepository, UserRepository $userRepository): Response
    {
        $rocket = $rocketRepository->findOneBy(['title' => 'Project Website of mr Chatelain']);
        $xavier = $userRepository->findOneBy(['firstname' => 'Xavier']);
        return $this->render('magnet/index.html.twig', [
            'xavier' => $xavier,
            'rocket' => $rocket,
        ]);
    }
}
