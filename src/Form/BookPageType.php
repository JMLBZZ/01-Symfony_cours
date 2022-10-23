<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\BookPage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class BookPageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->remove('imageName')
            ->add('imageFile', FileType::class, [
                "help"=>"Poids max : 2Mo", 
                "help_attr"=>["class"=>"text-info"],
                "label" => "Photo de l'auteur(e)", 
                "required" => false])
            ->add('book', EntityType::class, ["class"=>Author::class])
            ->remove('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BookPage::class,
        ]);
    }
}
