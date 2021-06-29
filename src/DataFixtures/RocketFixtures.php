<?php

namespace App\DataFixtures;

use App\Entity\Rocket;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RocketFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $date = new \DateTime();


        $rocket = new Rocket();
        $rocket->setDescription('Creation of a website for an artisan');
        $rocket->setTitle('Project Website of Mr. Durand');
        $rocket->addSkill($this->getReference('skill_0'));
        $rocket->addSkill($this->getReference('skill_1'));
        $rocket->addSkill($this->getReference('skill_2'));
        $rocket->setStartedAt($date);
        $manager->persist($rocket);


        $rocket = new Rocket();
        $rocket->setDescription('Realisation of a web app of Ping-Pong');
        $rocket->setTitle('Project Website of mr Chatelain');
        $rocket->addSkill($this->getReference('skill_0'));
        $rocket->addSkill($this->getReference('skill_1'));
        $rocket->addSkill($this->getReference('skill_2'));
        $rocket->addSkill($this->getReference('skill_3'));
        $rocket->addUser($this->getReference('user_2'));
        $rocket->addUser($this->getReference('user_3'));
        $rocket->addUser($this->getReference('user_4'));
        $rocket->addUser($this->getReference('user_5'));
        $rocket->setStartedAt($date);
        $manager->persist($rocket);


        $rocket = new Rocket();
        $rocket->setDescription('Creation of a webapp to meet single people');
        $rocket->setTitle('Project of Sara');
        $rocket->addSkill($this->getReference('skill_0'));
        $rocket->addSkill($this->getReference('skill_1'));
        $rocket->addSkill($this->getReference('skill_2'));
        $rocket->addSkill($this->getReference('skill_3'));
        $rocket->addSkill($this->getReference('skill_4'));
        $rocket->addUser($this->getReference('user_6'));
        $rocket->addUser($this->getReference('user_7'));
        $rocket->addUser($this->getReference('user_8'));
        $rocket->setStartedAt($date);
        $manager->persist($rocket);


        $rocket = new Rocket();
        $rocket->setDescription('Webapp of Gossip Girls');
        $rocket->setTitle('Project of Sophie !');
        $rocket->addSkill($this->getReference('skill_0'));
        $rocket->addSkill($this->getReference('skill_1'));
        $rocket->addSkill($this->getReference('skill_2'));
        $rocket->setStartedAt($date);
        $manager->persist($rocket);



        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SkillFixtures::class,
            UserFixtures::class,
        ];
    }
}
