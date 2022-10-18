<?php

namespace App\DataFixtures;

use App\Entity\Home;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HomeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $home = new Home();
        $home->setTitre("Bienvenue sur le site de la librairie");
        $home->setTexte("<p>Integer orci justo, sagittis sit amet nisi a, consectetur ultrices tortor. Nullam porttitor bibendum tellus, id cursus erat venenatis sed. Donec nec nisl euismod metus accumsan semper ac et mauris. Mauris sem nulla, molestie nec diam sit amet, facilisis lobortis purus. Pellentesque sollicitudin sem nec venenatis sodales. Etiam felis nibh, dignissim sit amet egestas efficitur, posuere a diam. Cras sollicitudin finibus dignissim. Quisque et condimentum tellus, vel tempus odio. Praesent egestas vehicula dignissim. Aenean at lacinia felis. Etiam eu purus mollis lectus faucibus venenatis eu sit amet neque. Morbi fringilla fermentum elit ac venenatis. Praesent sed metus dignissim, facilisis mauris id, posuere erat. Morbi tristique pretium turpis.</p>");
        $home->setSignature("L'équipe de la librairie");
        $home->setIsActive(true);
        $manager->persist($home);

        $manager->flush();
    }
}
