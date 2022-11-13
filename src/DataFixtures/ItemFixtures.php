<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ItemFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categ = new Category();
        $categ->setName("test_categ");
        $manager->persist($categ);
        $manager->flush();

        $item = new Item();
        $item->setName("test_item");
        $item->setCategory($categ);
        $manager->persist($item);
        $manager->flush();
    }
}
