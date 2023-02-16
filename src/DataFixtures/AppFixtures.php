<?php

namespace App\DataFixtures;

use App\Entity\Link;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i<10; $i++){
            $link = new Link();
            $link->setTitle("A link fixtured $i")
                ->setUrl("http://google.com");
            $manager->persist($link);
        }

        $manager->flush();
    }
}
