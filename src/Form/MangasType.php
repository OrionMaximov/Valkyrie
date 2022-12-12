<?php

namespace App\Form;

use App\Entity\Mangas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class MangasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('auteur')
            ->add('tome')
            ->add('serie')
            ->add('isbn')
            ->add('quantite')
            ->add('tarif')
            ->add('etat')
            ->add('prix')
            ->add('pervers')
            ->add('image',FileType::class,[
                'mapped'=>false,
                'attr'=>[
                    "accept"=> "image/*"
                ],
                'constraints'=>[
                    new Image()
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mangas::class,
        ]);
    }
}
