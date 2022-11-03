<?php

namespace App\Form;

use App\Entity\User;
use App\Form\AvatarType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, ["label" => "Email"])
            // ->add('roles')
            // ->add('password')
            ->add('name', TextType::class, ["label" => "Nom"])
            ->add('firstName', TextType::class, ["label" => "Prénom"])
            ->add('pseudo', TextType::class, ["label" => "Pseudo", "required"=>false])
            ->add('address', TextType::class, ["label" => "Adresse", "required"=>false])
            ->add('address2', TextType::class, ["label" => "Complément d'adress", "required"=>false])
            ->add('zipCode', TextType::class, ["label" => "Code Postale", "required"=>false])
            ->add('city', TextType::class, ["label" => "Ville", "required"=>false])
            ->add('country', CountryType::class, ["label" => "Pays", "required"=>false])
            ->add('avatar', AvatarType::class, ["label"=>false])

            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passes ne sont pas identiques',
                // 'options' => ['attr' => ['class' => 'password-field']],
                'required' => false,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmer le mot de passe'],
                // 'mapped' => false
            ])


            ->add('save', SubmitType::class, ["label"=>"Sauvegarder", "attr"=>["class" => "btn btn-dark rounded"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
