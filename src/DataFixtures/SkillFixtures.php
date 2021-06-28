<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    public const SKILLS = [
        'Logo design',
        'Web dev',
        'Marketing',
        'SEO',
        'UX/UI',
        'Video editing',
        'Podcast editing',
    ];

    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < count(self::SKILLS); $i++) {
            $skill = new Skill();
            $skill->setName(self::SKILLS[$i]);
            $manager->persist($skill);
            $this->addReference('skill_' . $i, $skill);
        }
        $manager->flush();
    }
}
