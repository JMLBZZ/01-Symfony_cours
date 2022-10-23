<?php

namespace App\Form;

use App\Entity\Author;
use App\Form\BookType;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                "label"=>"Nom de l'auteur(e)", 
                "required"=>false])
            ->add('firstName', TextType::class, [
                "label"=>"Prénom de l'auteur(e)", 
                "required"=>false])
            ->add('pseudo', TextType::class, [
                "label"=>"Pseudo de l'auteur(e)", 
                "required"=>false])
            ->add('imageFile', FileType::class, [
                "help"=>"Poids max : 2Mo", 
                "help_attr"=>["class"=>"text-info"],
                "label" => "Photo de l'auteur(e)", 
                "required" => false])
            ->add('biography', CKEditorType::class, [
                "label"=>"Description de l'auteur(e)", 
                "required"=>false])
            ->add('birthdate', DateTimeType::class, [
                'widget' => 'single_text',
                "label"=>"Date de naissance de l'auteur(e)",
                "required"=>false])
            ->add('dateOfDeath', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd', 
                "label"=>"Date de décès de l'auteur(e)",
                "required"=>false])
            ->add('books', CollectionType::class, [
                "entry_type"=>BookType::class,
                "allow_add"=>true,
                "allow_delete"=>true,
                "by_reference"=>false,
                "label"=>false])

            ->remove('imageName')
            ->remove('updatedAt')
            ->remove('slug')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Author::class,
        ]);
    }
}
