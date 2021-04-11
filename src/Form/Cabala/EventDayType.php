<?php

namespace App\Form\Cabala;

use App\Entity\Cabala;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventDayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('eventDay', IntegerType::class, [
                'label' => 'Hora à Investigar',
                'attr' => [
                    'placeholder' => 'Entre 1h e 12h',
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
