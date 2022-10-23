<?php

namespace App\DataFixtures;

use App\Entity\BookCategory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BookCategoryFixtures extends Fixture
{
// ##################################################################### //
// ############################# PROPRIÉTÉS ############################ //
// ##################################################################### //
    public const MANGA = "manga";
    public const BD = "bande dessinée";
    public const ROMAN = "roman";
    public const SCIENCE_FICTION = "science fiction";
    public const CUISINE = "cuisine";
    public const TECHNIQUE = "technique";
    public const ART = "art";
    public const BRICOLAGE = "bricolage";
    public const INFORMATIQUE = "informatique";
    public const JEUX_VIDEO = "jeux video";

// ##################################################################### //
// ############################## METHODES ############################# //
// ##################################################################### //
    public function load(ObjectManager $manager): void
    {
        $bookCategory = new BookCategory();
        $bookCategory->setName('Manga');
        $manager->persist($bookCategory);
        $this->setReference(self::MANGA, $bookCategory);

        $bookCategory = new BookCategory();
        $bookCategory->setName('BD');
        $manager->persist($bookCategory);
        $this->setReference(self::BD, $bookCategory);


        $bookCategory = new BookCategory();
        $bookCategory->setName('Roman');
        $manager->persist($bookCategory);
        $this->setReference(self::ROMAN, $bookCategory);


        $bookCategory = new BookCategory();
        $bookCategory->setName('Science Fiction');
        $manager->persist($bookCategory);
        $this->setReference(self::SCIENCE_FICTION, $bookCategory);


        $bookCategory = new BookCategory();
        $bookCategory->setName('Cuisine');
        $manager->persist($bookCategory);
        $this->setReference(self::CUISINE, $bookCategory);

        $bookCategory = new BookCategory();
        $bookCategory->setName('Technique');
        $manager->persist($bookCategory);
        $this->setReference(self::TECHNIQUE, $bookCategory);

        $bookCategory = new BookCategory();
        $bookCategory->setName('Art');
        $manager->persist($bookCategory);
        $this->setReference(self::ART, $bookCategory);

        $bookCategory = new BookCategory();
        $bookCategory->setName('Bricolage');
        $manager->persist($bookCategory);
        $this->setReference(self::BRICOLAGE, $bookCategory);

        $bookCategory = new BookCategory();
        $bookCategory->setName('Informatique');
        $manager->persist($bookCategory);
        $this->setReference(self::INFORMATIQUE, $bookCategory);

        $bookCategory = new BookCategory();
        $bookCategory->setName('Jeux-vidéo');
        $manager->persist($bookCategory);
        $this->setReference(self::JEUX_VIDEO, $bookCategory);




        $manager->flush();
    }
}
