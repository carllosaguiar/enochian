<?php

namespace App\Form\Cabala;

use App\Entity\Cabala;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BirthCabalaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('birthCabal', IntegerType::class, [
                'label' => 'Ano de Nascimento',
                'attr' => [
                    'placeholder' => '1987',
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
