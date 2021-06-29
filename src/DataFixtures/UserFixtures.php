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
        'Chatelin',
        'Banon',
        'Cesne',
        'Letor',
        'Vidal',
        'Bouchard',
        'Reisse',
        'Letertre',
        'Arredondo',
        'Labussière',
        'Bennaby',
        'Paillard',
        'Azou',
        'Degorges',
        'Desgranges',
        'David',
        'Hararri',
        'Paillard',
        'Toussaint',
        'Sabatier',
        'Ajana',
        'Sansone',
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

        $user = new User();
        $user->setAstroSign('Cancer');
        $user->setFirstname('Xavier');
        $user->setEmail('xavier.dupont@gmail.com');
        $user->setLastname('Dupont');
        $plainPassword = 'famille';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_7'));
        $user->addSkill($this->getReference('skill_0'));
        $user->addSkill($this->getReference('skill_1'));
        $user->addSkill($this->getReference('skill_2'));
        $manager ->persist($user);
        $this->addReference('user_22', $user);





        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Fabrice');
        $user->setLastname('Morgan');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_1'));
        $manager ->persist($user);
        $this->addReference('user_23', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Erwan');
        $user->setLastname('Lequellec');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_1'));
        $manager ->persist($user);
        $this->addReference('user_24', $user);


        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Nabilla');
        $user->setLastname('Laroche');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(false);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_4'));
        $manager ->persist($user);
        $this->addReference('user_25', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Marine');
        $user->setLastname('Gaigeard');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(false);
        $user->addSkill($this->getReference('skill_4'));
        $manager ->persist($user);
        $this->addReference('user_26', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Cindy');
        $user->setLastname('Wizigo');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(false);
        $user->addSkill($this->getReference('skill_2'));
        $manager ->persist($user);
        $this->addReference('user_27', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Coralie');
        $user->setLastname('Rochas');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_2'));
        $manager ->persist($user);
        $this->addReference('user_28', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Morgan');
        $user->setLastname('Dumans');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_5'));
        $manager ->persist($user);
        $this->addReference('user_29', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Bernadette');
        $user->setLastname('Kuong');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(false);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_5'));
        $manager ->persist($user);
        $this->addReference('user_30', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Gerard');
        $user->setLastname('Bouchard');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(false);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_3'));
        $manager ->persist($user);
        $this->addReference('user_31', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Umar');
        $user->setLastname('Ganesh');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(false);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_3'));
        $manager ->persist($user);
        $this->addReference('user_32', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Patrick');
        $user->setLastname('Martin');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_6'));
        $manager ->persist($user);
        $this->addReference('user_33', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Mylene');
        $user->setLastname('Farmer');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_6'));
        $manager ->persist($user);
        $this->addReference('user_34', $user);


        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Thomas');
        $user->setLastname('Lancien');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_1'));
        $manager ->persist($user);
        $this->addReference('user_35', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Veronica');
        $user->setLastname('Bank');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(false);
        $user->addSkill($this->getReference('skill_1'));
        $manager ->persist($user);
        $this->addReference('user_36', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Monica');
        $user->setLastname('Loreal');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_2'));
        $manager ->persist($user);
        $this->addReference('user_37', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Samantha');
        $user->setLastname('Martine');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_2'));
        $manager ->persist($user);
        $this->addReference('user_38', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Charlotte');
        $user->setLastname('Siemens');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_3'));
        $manager ->persist($user);
        $this->addReference('user_39', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Geraldine');
        $user->setLastname('Korinthe');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_3'));
        $manager ->persist($user);
        $this->addReference('user_40', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Robin');
        $user->setLastname('Despres');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_4'));
        $manager ->persist($user);
        $this->addReference('user_41', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Jamel');
        $user->setLastname('Debouzze');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_4'));
        $manager ->persist($user);
        $this->addReference('user_42', $user);

        $user = new User();
        $user->setAstroSign(self::ASTRO_SIGN[rand(0,count(self::ASTRO_SIGN) - 1)]);
        $user->setFirstname('Alexis');
        $user->setLastname('Roche');
        $user->setEmail($user->getFirstname() . $user->getLastname() . "@gmail.com");
        $plainPassword = 'azerty';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setPhoto($user->getFirstname() . ".png");
        $user->setOnFiverr(true);
        $user->setOnLinkedIn(true);
        $user->addSkill($this->getReference('skill_0'));
        $manager ->persist($user);
        $this->addReference('user_43', $user);



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
