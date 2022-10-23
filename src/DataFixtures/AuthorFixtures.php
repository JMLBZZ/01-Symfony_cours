<?php

namespace App\DataFixtures;

use App\Entity\Author;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AuthorFixtures extends Fixture
{
// ##################################################################### //
// ############################# PROPRIÉTÉS ############################ //
// ##################################################################### //
    public const AKIRA_TORIYAMA = "akira toriyama";
    public const EIICHIRO_ODA = "eiichiro oda";
    public const KENTARO_MIURA = "kentaro miura";
    public const MOEBIUS = "moebius";
    public const JODOROWSKY = "jodorowsky";
    public const YOSHITAKA = "yoshitaka amano";
    public const VINCI = "leonard de vinci";
    public const CLANCY = "tom clancy";
    public const FLEMMING = "ian flemming";



// ##################################################################### //
// ############################## METHODES ############################# //
// ##################################################################### //
    public function load(ObjectManager $manager): void
    {
        $author = new Author();
        $author->setName('Toriyama');
        $author->setFirstName('Akira');
        $author->setSlug('akira-toriyama');
        $author->setImageName('tori.jpeg');
        $author->setBirthdate(new DateTime("1955/04/05"));
        $manager->persist($author);
        $this->setReference(self::AKIRA_TORIYAMA, $author);

        $author = new Author();
        $author->setName('Oda');
        $author->setFirstName('Eiichiro');
        $author->setSlug('eiichiro-oda');
        $author->setImageName('oda.jpeg');
        $author->setBirthdate(new DateTime("1975/01/01"));
        $manager->persist($author);
        $this->setReference(self::EIICHIRO_ODA, $author);


        $author = new Author();
        $author->setName('Miura');
        $author->setFirstName('Kentaro');
        $author->setSlug('kentaro-miura');
        $author->setImageName('kentaro.jpeg');
        $author->setBirthdate(new DateTime("1966/01/11"));
        $author->setDateOfDeath(new DateTime("2021/05/01"));
        $manager->persist($author);
        $this->setReference(self::KENTARO_MIURA, $author);


        $author = new Author();
        $author->setName('Giraud');
        $author->setFirstName('Jean');
        $author->setPseudo('Moebius');
        $author->setSlug('jean-giraud-moebius');
        $author->setImageName('moebius.jpeg');
        $author->setBirthdate(new DateTime("1938/05/08"));
        $author->setDateOfDeath(new DateTime("2012/04/10"));
        $manager->persist($author);
        $this->setReference(self::MOEBIUS, $author);

        $author = new Author();
        $author->setName('Jodorowsky');
        $author->setFirstName('Alejandro');
        $author->setSlug('alejandro-jodorowsky');
        $author->setImageName('jodorowsky.webp');
        $author->setBirthdate(new DateTime("1929/02/17"));
        $manager->persist($author);
        $this->setReference(self::JODOROWSKY, $author);

        $author = new Author();
        $author->setName('Amano');
        $author->setFirstName('Yoshitaka');
        $author->setSlug('yoshitaka-amano');
        $author->setImageName('amano.jpg');
        $author->setBirthdate(new DateTime("1952/03/26"));
        $manager->persist($author);
        $this->setReference(self::YOSHITAKA, $author);

        $author = new Author();
        $author->setName('De Vinci');
        $author->setFirstName('Leonard');
        $author->setSlug('leonard-de-vinci');
        $author->setImageName('vinci.jpg');
        $author->setBirthdate(new DateTime("1452/04/14"));
        $author->setDateOfDeath(new DateTime("1519/05/02"));
        $manager->persist($author);
        $this->setReference(self::VINCI, $author);

        $author = new Author();
        $author->setName('Clancy');
        $author->setFirstName('Tom');
        $author->setSlug('tom-clancy');
        $author->setImageName('clancy.jpg');
        $author->setBirthdate(new DateTime("1947/04/12"));
        $author->setDateOfDeath(new DateTime("2013/10/01"));
        $manager->persist($author);
        $this->setReference(self::CLANCY, $author);

        $author = new Author();
        $author->setName('Flemming');
        $author->setFirstName('Ian');
        $author->setSlug('ian-flemming');
        $author->setImageName('flemming.jpg');
        $author->setBirthdate(new DateTime("1908/05/28"));
        $author->setDateOfDeath(new DateTime("1964/08/12"));
        $manager->persist($author);
        $this->setReference(self::FLEMMING, $author);

        $manager->flush();
    }
}
