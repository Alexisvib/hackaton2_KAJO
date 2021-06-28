<?php


namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\User\User;

class UserFixtures extends Fixture
{
    public const FIRSTNAME = [
        'François',
        'Marlène',
        'Eric',
        'Lionel',
        'Arthur',
        'Bastien',
        'Nicolas',
        'Killian',
        'Olivier',
        'Alexis',
        'Solène',
        'Marie',
        'Justine',
        'Margaux',
        'Jeanette',
        'Sophie',
        'Sara',
        'Julien',
        'Justine',
        'Jean',
        'Jean-charles',
        'Charles-Hugo',
        'Hugo',
    ];

    public const LASTNAME = [
        'chatelin',
        'banon',
        'cesne',
        'letor',
        'vidal',
        'bouchard',
        'reisse',
        'letertre',
        'arredondo',
        'roche',
        'labussière',
        'bennaby',
        'benmoufok',
        'azou',
        'degorges',
        'desgranges',
        'david',
        'hararri',
        'paillard',
        'toussaint',
        'sabatier',
        'ajana',
        'sansone',
    ];
    
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname()
        $manager ->persist($user);
        $manager->flush();
    }
}
