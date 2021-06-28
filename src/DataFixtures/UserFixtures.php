<?php


namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

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
        'Julie',
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
        'paillard',
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

        for ($i = 0; $i < count(self::FIRSTNAME); $i++) {
            $user = new User();
            $user->setFirstname(self::FIRSTNAME[$i]);
            $user->setLastname(self::LASTNAME[$i]);
            $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
            $user->setPassword($user->getFirstname() . $user->getLastname() );
            $user->setPhoto($user->getFirstname() . ".png");
            $user->setAstroSign('Cancer');
            if($i < 7 ) {
                $user->setOnFiverr(true);
                $user->setOnLinkedIn(false);
            } elseif ($i >= 7 && $i < 14) {
                $user->setOnFiverr(false);
                $user->setOnLinkedIn(true);
            } else {
                $user->setOnFiverr(true);
                $user->setOnLinkedIn(true);
            }
            $manager ->persist($user);
            $this->setReference('user_' . $i, $user);
        }

        $manager->flush();
    }
}
