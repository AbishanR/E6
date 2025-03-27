<?php

namespace App\Form;

use App\Entity\Chien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ChienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, [
            'mapped'=>false, 
            'required'=>false, 
            'label'=> "image"
            ])
            ->add('image',HiddenType::class)
            ->add('nom', TextType::class,[
            'attr'=>['class'=>'form-control'],
            'label'=> "Nom du produit",
            'required'=> false,
            'attr'=>[
                'placeholder' =>"Saisir le nom du produit",
                'class'=>'form-control'
            ]
            ])
            ->add ('prix')
            ->add('description', TextType::class, [
                'attr'=>['class'=>'form-control',
                'placeholder' =>"Saisir une description"]
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chien::class,
        ]);
    }
}
