<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Author;
use App\Entity\BookCategory;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isActive', CheckboxType::class, [
                "label"=>"Activer la page?", 
                "row_attr"=>["class"=>"form-switch"],
                "required"=>false])
            ->add('title', TextType::class, [ 
                "label"=>"Titre du livre", 
                "required"=>true])
            ->add('description', CKEditorType::class, [
                "label"=>"Synopsis", 
                "required" => false])
            ->add('imageFile', FileType::class, [
                "help"=>"Poids max : 2Mo", 
                "help_attr"=>["class"=>"text-info"],
                "label" => "Photo de couverture", 
                "required" => $options["imageRequired"]])
                
            ->add('book_category', EntityType::class, [
                "class"=>BookCategory::class,
                "label"=>"Catégorie",
                "required"=>true])

            ->remove('imageName')
            ->remove('updatedAt')
            ->remove('slug')
        ;
        if(!$options["fromAuthor"]) {
            $builder
            ->add('author', EntityType::class, [
                "class"=>Author::class,
                "label"=>"Auteur(e)",
                "required"=>true]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
            "fromAuthor"=>false,
            "imageRequired"=>true,
        ]);
    }
}
