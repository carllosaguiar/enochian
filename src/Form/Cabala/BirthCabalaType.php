<?php

namespace App\Form\Cabala;

use App\Entity\Cabala;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BirthCabalaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('birthCabala', IntegerType::class, [
                'mapped' => false,
                'label' => 'Ano de Nascimento',
                'attr' => [
                    'placeholder' => 'Seu ano de nascimento',
                    'class' => 'mb-3'
                ]
            ])
            ->add('amountEvents', IntegerType::class, [
                'mapped' => false,
                'label' => 'Quantidade de Anos',
                'attr' => [
                    'placeholder' => 'Quantidade de Anos a serem analizados',
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
