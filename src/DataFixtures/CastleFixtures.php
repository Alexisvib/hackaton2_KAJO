<?php

namespace App\DataFixtures;

use App\Entity\Castle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CastleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $castle = new Castle();
        $castle->setName('castle1');
        $manager->persist($castle);

        $castle = new Castle();
        $castle->setName('castle2');
        $manager->persist($castle);

        $castle = new Castle();
        $castle->setName('castle3');
        $manager->persist($castle);

        $manager->flush();
    }
}
