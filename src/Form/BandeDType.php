<?php

namespace App\Form;

use App\Entity\BandeD;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BandeDType extends AbstractType
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
            ->add('image')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BandeD::class,
        ]);
    }
}
