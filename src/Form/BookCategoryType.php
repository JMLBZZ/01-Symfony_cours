<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\BookCategory;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BookCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ["label" => "Nom", "required" => true])
            ->add('description', CKEditorType::class, ["label"=>"Description", "required" => false])

            // ->add('author', EntityType::class, [
            //     "class"=>Author::class,
            //     "label"=>"Auteur(e)",
            //     "required"=>true])
            // ->add('book_category', EntityType::class, [
            //     "class"=>BookCategory::class,
            //     "label"=>"Catégorie",
            //     "required"=>true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BookCategory::class,
        ]);
    }
}
