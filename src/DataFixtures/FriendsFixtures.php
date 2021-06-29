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

        //for alexis
        $alexis = $this->getReference('user_43');
        for($i = 23; $i <=34; $i++) {
            $alexis->addFriend($this->getReference('user_' . $i));
        }

        //then the user he know that have the correspondant contact
        $this->getReference('user_25')->addFriend($this->getReference('user_35'));
        $this->getReference('user_26')->addFriend($this->getReference('user_36'));
        $this->getReference('user_29')->addFriend($this->getReference('user_37'));
        $this->getReference('user_30')->addFriend($this->getReference('user_38'));
        $this->getReference('user_33')->addFriend($this->getReference('user_39'));
        $this->getReference('user_34')->addFriend($this->getReference('user_40'));



        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
