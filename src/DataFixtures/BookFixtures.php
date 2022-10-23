<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $book = new Book();
        $book->setTitle("Dr. Slump");
        $book->setSlug('dr-slump');
        $book->setImageName('drslump.jpg');
        $book->setAuthor($this->getReference(AuthorFixtures::AKIRA_TORIYAMA));
        $book->setBookCategory($this->getReference(BookCategoryFixtures::MANGA));
        $book->setIsActive(true);
        $manager->persist($book);

        $book = new Book();
        $book->setTitle("One Piece");
        $book->setSlug('one-piece');
        $book->setImageName('OP.jpg');
        $book->setAuthor($this->getReference(AuthorFixtures::EIICHIRO_ODA));
        $book->setBookCategory($this->getReference(BookCategoryFixtures::MANGA));
        $book->setIsActive(true);
        $manager->persist($book);

        $book = new Book();
        $book->setTitle("Berserk");
        $book->setSlug('berserk');
        $book->setImageName('Berserk.jpg');
        $book->setAuthor($this->getReference(AuthorFixtures::KENTARO_MIURA));
        $book->setBookCategory($this->getReference(BookCategoryFixtures::MANGA));
        $book->setIsActive(true);
        $manager->persist($book);

        $book = new Book();
        $book->setTitle("L'Incal");
        $book->setSlug('l-incal');
        $book->setImageName('Incal.jpg');
        $book->setAuthor($this->getReference(AuthorFixtures::MOEBIUS));
        $book->setBookCategory($this->getReference(BookCategoryFixtures::BD));
        $book->setIsActive(true);
        $manager->persist($book);

        $book = new Book();
        $book->setTitle("Meta Barons");
        $book->setSlug('meta-barons');
        $book->setImageName('Meta_barons.jpg');
        $book->setAuthor($this->getReference(AuthorFixtures::JODOROWSKY));
        $book->setBookCategory($this->getReference(BookCategoryFixtures::BD));
        $book->setIsActive(true);
        $manager->persist($book);

        $book = new Book();
        $book->setTitle("AMANO");
        $book->setSlug('amano');
        $book->setImageName('AMANO.jpg');
        $book->setAuthor($this->getReference(AuthorFixtures::YOSHITAKA));
        $book->setBookCategory($this->getReference(BookCategoryFixtures::ART));
        $book->setIsActive(true);
        $manager->persist($book);

        $book = new Book();
        $book->setTitle("Léonard de Vinci");
        $book->setSlug('leonard-de-vinci');
        $book->setImageName('jeconde.jpg');
        $book->setAuthor($this->getReference(AuthorFixtures::VINCI));
        $book->setBookCategory($this->getReference(BookCategoryFixtures::ART));
        $book->setIsActive(true);
        $manager->persist($book);

        $book = new Book();
        $book->setTitle("Tom Clancy");
        $book->setSlug('tom-clancy');
        $book->setImageName('clancy.webp');
        $book->setAuthor($this->getReference(AuthorFixtures::CLANCY));
        $book->setBookCategory($this->getReference(BookCategoryFixtures::ROMAN));
        $book->setIsActive(true);
        $manager->persist($book);

        $book = new Book();
        $book->setTitle("Ian Flemming");
        $book->setSlug('ian-flemming');
        $book->setImageName('007.jpg');
        $book->setAuthor($this->getReference(AuthorFixtures::FLEMMING));
        $book->setBookCategory($this->getReference(BookCategoryFixtures::ROMAN));
        $book->setIsActive(true);
        $manager->persist($book);

        $manager->flush();
    }
}
