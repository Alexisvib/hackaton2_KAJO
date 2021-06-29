<?php


namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public const FIRSTNAME = [
        'Francois',
        'Marlene',
        'Eric',
        'Lionel',
        'Arthur',
        'Bastien',
        'Nicolas',
        'Killian',
        'Olivier',
        'Alexis',
        'Solene',
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

    public const ASTRO_SIGN = [
        'Aries',
        'Taurus',
        'Gemini',
        'Cancer',
        'Leo',
        'Virgo',
        'Libra',
        'Scorpio',
        'Sagittarius',
        'Capricorn',
        'Aquarius',
        'Pisces',
    ];

    private UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        $users = [];

        for ($i = 0; $i < count(self::FIRSTNAME); $i++) {
            $user = new User();
            $user->setFirstname(self::FIRSTNAME[$i]);
            $user->setLastname(self::LASTNAME[$i]);
            $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
            $plainPassword = 'azerty';
            $encoded = $this->encoder->encodePassword($user, $plainPassword);
            $user->setPassword($encoded);
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
            $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
            $this->addReference('user_' . $i, $user);
            $users[] = $user;
            $manager ->persist($user);
            $this->setReference('user_' . $i, $user);
        }

        $user = new User();
        $user->setAstroSign('Cancer');
        $user->setFirstname('Xavier');
        $user->setEmail('xavier.dll@gmail.com');
        $user->setLastname('DDL');
        $plainPassword = 'famille';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $manager ->persist($user);
        $this->addReference('user_23', $user);

        $manager->flush();
    }
}


