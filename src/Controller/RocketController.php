<?php

namespace App\Controller;

use App\Entity\Rocket;
use App\Entity\User;
use App\Form\RocketType;
use App\Repository\UserRepository;
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
    public function building(Rocket $rocket, EntityManagerInterface $entityManager, UserRepository $userRepository) : Response
    {

        $devs1[] = $userRepository->findOneBy(['firstname'=>'Nabilla','lastname'=>'Laroche']);
        $devs1[] = $userRepository->findOneBy(['firstname'=>'Erwan','lastname'=>'Lequellec']);
        $devs1[] = $userRepository->findOneBy(['firstname'=>'Marine','lastname'=>'Gaigeard']);
        $devs1[] = $userRepository->findOneBy(['firstname'=>'Morgan','lastname'=>'Dumans']);
        $devs2[] = $userRepository->findOneBy(['firstname'=>'Cindy','lastname'=>'Wizigo']);
        $devs2[] = $userRepository->findOneBy(['firstname'=>'Coralie','lastname'=>'Rochas']);
        $devs2[] = $userRepository->findOneBy(['firstname'=>'Bernadette','lastname'=>'Kuong']);
        $devs2[] = $userRepository->findOneBy(['firstname'=>'Gerard','lastname'=>'Bouchard']);
        $devs2[] = $userRepository->findOneBy(['firstname'=>'Umar','lastname'=>'Ganesh']);
        $markets1[] = $userRepository->findOneBy(['firstname'=>'Monica','lastname'=>'Loreal']);
        $markets1[] = $userRepository->findOneBy(['firstname'=>'Samantha','lastname'=>'Martine']);
        $markets1[] = $userRepository->findOneBy(['firstname'=>'Nabilla','lastname'=>'Laroche']);
        $markets1[] = $userRepository->findOneBy(['firstname'=>'Umar','lastname'=>'Ganesh']);
        $markets2[] = $userRepository->findOneBy(['firstname'=>'Fabrice','lastname'=>'Morgan']);
        $markets2[] = $userRepository->findOneBy(['firstname'=>'Patrick','lastname'=>'Martin']);
        $markets2[] = $userRepository->findOneBy(['firstname'=>'Mylene','lastname'=>'Fermier']);
        $markets2[] = $userRepository->findOneBy(['firstname'=>'Thomas','lastname'=>'Lancien']);
        $markets2[] = $userRepository->findOneBy(['firstname'=>'Veronica','lastname'=>'Bank']);
        $SEO1[] = $userRepository->findOneBy(['firstname'=>'Geraldine','lastname'=>'Korinthe']);
        $SEO2[] = $userRepository->findOneBy(['firstname'=>'Charlotte','lastname'=>'Siemens']);
        $SEO2[] = $userRepository->findOneBy(['firstname'=>'Robin','lastname'=>'Despres']);
        $chosen[] = $userRepository->findOneBy(['firstname'=>'Bernadette','lastname'=>'Kuong']);
        $chosen[] = $userRepository->findOneBy(['firstname'=>'Fabrice','lastname'=>'Morgan']);
        $chosen[] = $userRepository->findOneBy(['firstname'=>'Charlotte','lastname'=>'Siemens']);
        $chosen[] = $userRepository->findOneBy(['firstname'=>'Xavier','lastname'=>'Dupont']);
        $devFriends = [0,0,2,3];
        $marketFriends = [0,0,1,4];
        $SEOFriends = [2];
        return $this->render('rocket/builder.html.twig', [
           'dev1' => $devs1,
           'dev2' => $devs2,
            'market1' => $markets1,
            'market2' => $markets2,
            'SEO1'=>$SEO1,
            'SEO2'=>$SEO2,
            'rocket'=>$rocket,
            'chosen'=>$chosen,
            'devFriends'=>$devFriends,
            'marketFriends'=>$marketFriends,
            'SEOFriends'=>$SEOFriends
        ]);
    }

    /**
     * @Route("/{id}/teambuilding", name="buildingv2")
     */
    public function buildingv2(Rocket $rocket, EntityManagerInterface $entityManager, UserRepository $userRepository) : Response
    {

        $devs1[] = $userRepository->findOneBy(['firstname'=>'Nabilla','lastname'=>'Laroche']);
        $devs1[] = $userRepository->findOneBy(['firstname'=>'Erwan','lastname'=>'Lequellec']);
        $devs1[] = $userRepository->findOneBy(['firstname'=>'Marine','lastname'=>'Gaigeard']);
        $devs1[] = $userRepository->findOneBy(['firstname'=>'Morgan','lastname'=>'Dumans']);
        $devs2[] = $userRepository->findOneBy(['firstname'=>'Cindy','lastname'=>'Wizigo']);
        $devs2[] = $userRepository->findOneBy(['firstname'=>'Coralie','lastname'=>'Rochas']);
        $devs2[] = $userRepository->findOneBy(['firstname'=>'Bernadette','lastname'=>'Kuong']);
        $devs2[] = $userRepository->findOneBy(['firstname'=>'Gerard','lastname'=>'Bouchard']);
        $devs2[] = $userRepository->findOneBy(['firstname'=>'Umar','lastname'=>'Ganesh']);
        $markets1[] = $userRepository->findOneBy(['firstname'=>'Monica','lastname'=>'Loreal']);
        $markets1[] = $userRepository->findOneBy(['firstname'=>'Samantha','lastname'=>'Martine']);
        $markets1[] = $userRepository->findOneBy(['firstname'=>'Nabilla','lastname'=>'Laroche']);
        $markets1[] = $userRepository->findOneBy(['firstname'=>'Umar','lastname'=>'Ganesh']);
        $markets2[] = $userRepository->findOneBy(['firstname'=>'Fabrice','lastname'=>'Morgan']);
        $markets2[] = $userRepository->findOneBy(['firstname'=>'Patrick','lastname'=>'Martin']);
        $markets2[] = $userRepository->findOneBy(['firstname'=>'Mylene','lastname'=>'Fermier']);
        $markets2[] = $userRepository->findOneBy(['firstname'=>'Thomas','lastname'=>'Lancien']);
        $markets2[] = $userRepository->findOneBy(['firstname'=>'Veronica','lastname'=>'Bank']);
        $SEO1[] = $userRepository->findOneBy(['firstname'=>'Geraldine','lastname'=>'Korinthe']);
        $SEO2[] = $userRepository->findOneBy(['firstname'=>'Charlotte','lastname'=>'Siemens']);
        $SEO2[] = $userRepository->findOneBy(['firstname'=>'Robin','lastname'=>'Despres']);
        $chosen[] = $userRepository->findOneBy(['firstname'=>'Bernadette','lastname'=>'Kuong']);
        $chosen[] = $userRepository->findOneBy(['firstname'=>'Fabrice','lastname'=>'Morgan']);
        $chosen[] = $userRepository->findOneBy(['firstname'=>'Charlotte','lastname'=>'Siemens']);
        $chosen[] = $userRepository->findOneBy(['firstname'=>'Xavier','lastname'=>'Dupont']);
        $devFriends = [0,0,2,3];
        $marketFriends = [0,0,1,4];
        $SEOFriends = [2];
        return $this->render('rocket/builderv2.html.twig', [
            'dev1' => $devs1,
            'dev2' => $devs2,
            'market1' => $markets1,
            'market2' => $markets2,
            'SEO1'=>$SEO1,
            'SEO2'=>$SEO2,
            'rocket'=>$rocket,
            'chosen'=>$chosen,
            'devFriends'=>$devFriends,
            'marketFriends'=>$marketFriends,
            'SEOFriends'=>$SEOFriends
        ]);
    }
    /**
     * @Route("/team_building/{id}", name="buildingv3")
     */
    public function buildingv3(Rocket $rocket, EntityManagerInterface $entityManager, UserRepository $userRepository) : Response
    {

        $devs1[] = $userRepository->findOneBy(['firstname'=>'Nabilla','lastname'=>'Laroche']);
        $devs1[] = $userRepository->findOneBy(['firstname'=>'Erwan','lastname'=>'Lequellec']);
        $devs1[] = $userRepository->findOneBy(['firstname'=>'Marine','lastname'=>'Gaigeard']);
        $devs1[] = $userRepository->findOneBy(['firstname'=>'Morgan','lastname'=>'Dumans']);
        $devs2[] = $userRepository->findOneBy(['firstname'=>'Cindy','lastname'=>'Wizigo']);
        $devs2[] = $userRepository->findOneBy(['firstname'=>'Coralie','lastname'=>'Rochas']);
        $devs2[] = $userRepository->findOneBy(['firstname'=>'Bernadette','lastname'=>'Kuong']);
        $devs2[] = $userRepository->findOneBy(['firstname'=>'Gerard','lastname'=>'Bouchard']);
        $devs2[] = $userRepository->findOneBy(['firstname'=>'Umar','lastname'=>'Ganesh']);
        $markets1[] = $userRepository->findOneBy(['firstname'=>'Monica','lastname'=>'Loreal']);
        $markets1[] = $userRepository->findOneBy(['firstname'=>'Samantha','lastname'=>'Martine']);
        $markets1[] = $userRepository->findOneBy(['firstname'=>'Nabilla','lastname'=>'Laroche']);
        $markets1[] = $userRepository->findOneBy(['firstname'=>'Umar','lastname'=>'Ganesh']);
        $markets2[] = $userRepository->findOneBy(['firstname'=>'Fabrice','lastname'=>'Morgan']);
        $markets2[] = $userRepository->findOneBy(['firstname'=>'Patrick','lastname'=>'Martin']);
        $markets2[] = $userRepository->findOneBy(['firstname'=>'Mylene','lastname'=>'Fermier']);
        $markets2[] = $userRepository->findOneBy(['firstname'=>'Thomas','lastname'=>'Lancien']);
        $markets2[] = $userRepository->findOneBy(['firstname'=>'Veronica','lastname'=>'Bank']);
        $SEO1[] = $userRepository->findOneBy(['firstname'=>'Geraldine','lastname'=>'Korinthe']);
        $SEO2[] = $userRepository->findOneBy(['firstname'=>'Charlotte','lastname'=>'Siemens']);
        $SEO2[] = $userRepository->findOneBy(['firstname'=>'Robin','lastname'=>'Despres']);
        $chosen[] = $userRepository->findOneBy(['firstname'=>'Bernadette','lastname'=>'Kuong']);
        $chosen[] = $userRepository->findOneBy(['firstname'=>'Fabrice','lastname'=>'Morgan']);
        $chosen[] = $userRepository->findOneBy(['firstname'=>'Xavier','lastname'=>'Dupont']);
        $devFriends = [0,0,2,3];
        $marketFriends = [0,0,1,4];
        $SEOFriends = [2];
        return $this->render('rocket/builderv3.html.twig', [
            'dev1' => $devs1,
            'dev2' => $devs2,
            'market1' => $markets1,
            'market2' => $markets2,
            'SEO1'=>$SEO1,
            'SEO2'=>$SEO2,
            'rocket'=>$rocket,
            'chosen'=>$chosen,
            'devFriends'=>$devFriends,
            'marketFriends'=>$marketFriends,
            'SEOFriends'=>$SEOFriends
        ]);
    }




    /**
     * @Route("/{id}/fire", name="fire")
     */
    public function fire(Rocket $rocket, UserRepository $userRepository): Response
    {
        $bernadette = $userRepository->findOneBy(['firstname'=>'Bernadette','lastname'=>'Kuong']);
        $fabrice = $userRepository->findOneBy(['firstname'=>'Fabrice','lastname'=>'Morgan']);
        $xavier = $userRepository->findOneBy(['firstname'=>'Xavier','lastname'=>'Dupont']);



        return $this->render('rocket/fire.html.twig', [
            'rocket' => $rocket,
            'bernadette' => $bernadette,
            'fabrice' => $fabrice,
            'xavier' =>$xavier,
        ]);
    }
}
