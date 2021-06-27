<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $product = new Product();
        $product->setName('test');
        $manager->persist($product);

        $product = new Product();
        $product->setName('test1');
        $manager->persist($product);

        $product = new Product();
        $product->setName('test2');
        $manager->persist($product);

        $manager->flush();
    }
}
