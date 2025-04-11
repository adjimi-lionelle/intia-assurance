<?php

namespace App\Form;

use App\Entity\Surccusale;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('nom')
            ->add('telaphone')
            ->add('adresse')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('surccusale', EntityType::class, [
                'class' => Surccusale::class,
                'choice_label' => 'id',
            ])
            ->add('roles', ChoiceType::class, [
                'choices'  => [
                    'Admin' => 'ROLE_ADMIN',
                    'Agent' => 'ROLE_AGENT',
                    'Client' => 'ROLE_CLIENT',
                ],
                'expanded' => true, // pour afficher des cases à cocher
                'multiple' => true, // autoriser plusieurs rôles
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
