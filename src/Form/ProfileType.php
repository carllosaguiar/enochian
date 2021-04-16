<?php

namespace App\Form;

use App\Entity\Profile;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,  [
                'label' => 'Nome ',
                'attr' => [
                    'placeholder' => 'Seu nome completo',
                    'class' => 'mb-3'
                ]
            ])
            ->add('birthDate', DateType::class, [
                'label' => 'Data de Nascimento',
                'widget' => 'single_text',
                'attr' => [
                    'placeholder' => 'Data de Nascimento',
                    'class' => 'mb-3'
                ]
            ])
            ->add('gender', ChoiceType::class, [
                'label' => 'Genero',
                'choices' => [
                    'Masculino' => 'Masculino',
                    'Feminino' => 'Feminino'
                ],
                'attr' => [
                    'placeholder' => 'Selecione o genero',
                    'class' => 'mb-3'
                ]
            ])
            ->add('my_file', FileType::class, [
                'required' => false,
                'mapped' => false,
                'label' => 'Foto do Perfil',
                'attr' => [
                    'class' => 'mb-3'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profile::class,
        ]);
    }
}
