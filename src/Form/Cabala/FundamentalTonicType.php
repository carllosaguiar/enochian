<?php

namespace App\Form\Cabala;

use App\Entity\Cabala;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FundamentalTonicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fundamentalTonic', TextType::class, [
                'label' => 'Seu nome completo',
                'attr' => [
                    'placeholder' => 'Victor Manuel Chavez Caballero',
                    'class' => 'mb-3'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cabala::class,
        ]);
    }
}
