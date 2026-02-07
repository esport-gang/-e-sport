<?php

namespace App\Form;

use App\Entity\Equipe;
use App\Entity\Tournament;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Equipe1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Team Name',
                'attr' => ['class' => 'form-control']
            ])
            ->add('members', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'nom',
                'label' => 'Members',
                'multiple' => true,
                'attr' => ['class' => 'form-select']
            ])
            ->add('tournaments', EntityType::class, [
                'class' => Tournament::class,
                'choice_label' => 'name',
                'label' => 'Tournaments',
                'multiple' => true,
                'attr' => ['class' => 'form-select']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipe::class,
        ]);
    }
}
