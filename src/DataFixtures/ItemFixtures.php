<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ItemFixtures extends Fixture implements DependentFixtureInterface
{

    public function getDependencies()
    {
        return [
          CategoryFixtures::class,
        ];
    }

    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 100; $i++) { 
            $item = new Item();
            $item->setName('test_item' . $i);
            $item->setCategory($this->getReference('category_categ' . rand(1,5)));
            $manager->persist($item);
            $manager->flush();
        }
    }
}
