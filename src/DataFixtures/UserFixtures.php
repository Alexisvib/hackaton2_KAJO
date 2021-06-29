<?php


namespace App\DataFixtures;

use App\Entity\Skill;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
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
    public const SKILLS = [
        'skill_0',
        'skill_1',
        'skill_2',
        'skill_3',
        'skill_4',
        'skill_5',
        'skill_6',
        'skill_7',
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
            $skill1 = $this->getReference(self::SKILLS[rand(0,count(SkillFixtures::SKILLS) -1 )]);
            $skill2 = $this->getReference(self::SKILLS[rand(0,count(SkillFixtures::SKILLS) -1 )]);
            while ($this->checkSame($skill1,$skill2)) {
            $skill2 = $this->getReference(self::SKILLS[rand(0,count(SkillFixtures::SKILLS) -1 )]);
            }
            $user->addSkill($skill1);
            $user->addSkill($skill2);
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

        $manager->flush();
    }

    public function checkSame(Skill $skill1, Skill $skill2)
    {
        return $skill1->getId() === $skill2->getId();
    }

    public function getDependencies()
    {
        return [SkillFixtures::class];
    }
}
