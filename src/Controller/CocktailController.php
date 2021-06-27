<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CocktailController extends AbstractController
{
    /**
     * @Route("/cocktail", name="cocktail")
     */
    public function index(): Response
    {
        return $this->render('cocktail/index.html.twig');
    }
}
