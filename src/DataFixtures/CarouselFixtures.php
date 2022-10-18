<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CarouselFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $carousel = new Carousel();
        $carousel->setTag("home");
        $carousel->setImageName("bmw.jpeg");
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setTag("home");
        $carousel->setImageName("honda.jpeg");
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setTag("home");
        $carousel->setImageName("lambo.jpeg");
        $manager->persist($carousel);

        $manager->flush();
    }
}
