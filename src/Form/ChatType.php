<?php

namespace App\Form;

use App\Entity\Chat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ChatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, [
            'mapped'=>false, 
            'required'=>false, 
            'label'=> "image"
            ])
            ->add('image',TextType::class,[
                'attr'=>[]
            ])
            ->add('nom', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'label' => "Nom du produit",
                'required' => true,
                'attr' => [
                    'placeholder' => "Saisir le nom du produit",
                    'class' => 'form-control'
                ]
            ])
            ->add ('prix')
            ->add('description', TextType::class, [
                'attr'=>['class'=>'form-control',
                'placeholder' =>"Saisir une description"]
            ])
            ->add ('produit')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chat::class,
        ]);
    }
}
