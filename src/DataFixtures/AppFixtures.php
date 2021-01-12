<?php

namespace App\DataFixtures;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $product = new Product();
        $product->setName('puzzle');
        $product->setPrice('5.50');
        
        $manager->persist($product);
        
        $manager->flush();

        // creation 10 produits
        for ($i = 0; $i < 10; $i++) {
            $product = new Product();
            $product->setName('product '.$i);
            $product->setPrice(mt_rand(15, 210));
            $manager->persist($product);
        }
            $manager->flush();
    }
}
