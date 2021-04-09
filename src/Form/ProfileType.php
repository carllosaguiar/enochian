<?php

namespace App\Form;

use App\Entity\Profile;
use Doctrine\DBAL\Types\DateTimeImmutableType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
            ->add('image', FileType::class, [
                'label' => 'Foto do Perfil',
                'attr' => [
                    'placeholder' => 'Sua foto',
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
