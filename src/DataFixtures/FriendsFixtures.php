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

        //Marina Gaigeard est UX a deux amis dev Cindy Wizigo, Coralie Rochas,
        $this->getReference('user_26')->addFriend($this->getReference('user_27'));
        $this->getReference('user_26')->addFriend($this->getReference('user_28'));

        //Morgan Dumans est video editor a trois amis dev Bernadette Kuong, Gerard Bouchard,
        $this->getReference('user_29')->addFriend($this->getReference('user_30'));
        $this->getReference('user_29')->addFriend($this->getReference('user_31'));
        $this->getReference('user_29')->addFriend($this->getReference('user_32'));

        //Nabilla Laroche est dev et a 1 ami marketing Fabrice Morgane
        $this->getReference('user_25')->addFriend($this->getReference('user_23'));

        //Umar Ganesh est dev 4 amis marketing Patrick Martin // Mylene Farmer // Thomas Lancien // Veronica Bank
        $this->getReference('user_32')->addFriend($this->getReference('user_33'));
        $this->getReference('user_32')->addFriend($this->getReference('user_34'));
        $this->getReference('user_32')->addFriend($this->getReference('user_35'));
        $this->getReference('user_32')->addFriend($this->getReference('user_36'));

        //Geraldine Korinthe est Podacast editing et a 2 amis SEO Charlotte Siemens // Robin Despre
        $this->getReference('user_40')->addFriend($this->getReference('user_39'));
        $this->getReference('user_40')->addFriend($this->getReference('user_41'));
        
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
