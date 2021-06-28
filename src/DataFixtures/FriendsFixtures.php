<?php

namespace App\DataFixtures;

use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FriendsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < count(UserFixtures::FIRSTNAME); $i++) {
            $randomNbFriends = rand(1, 4);
            for ($j = 0; $j < $randomNbFriends; $j++) {
                $randFriend = rand(0, count(UserFixtures::FIRSTNAME) - 1);
                if ($randFriend !== $this->getReference('user_' . $i)->getId()) {
                    $this->getReference('user_' . $i)->addFriend($this->getReference('user_' . $randFriend));
                }
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
