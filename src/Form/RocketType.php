<?php

namespace App\Form;

use App\Entity\Rocket;
use App\Entity\Skill;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RocketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('users', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email',
                'label_attr' => [
                    'class' => '`checkbox-inline',
                ],
                'multiple' => true,
                'expanded' => false,
            ])
            ->add('skills', EntityType::class, [
                'class' => Skill::class,
                'choice_label' => 'name',
                'label_attr' => [
                    'class' => '`checkbox-inline',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rocket::class,
        ]);
    }
}
