<?php

namespace App\Form;

use App\Entity\Equipe;
use App\Entity\MatchGame;
use App\Entity\Tournament;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatchGame1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('equipe1', EntityType::class, [
                'class' => Equipe::class,
                'choice_label' => 'name',
                'label' => 'Team 1',
                'attr' => ['class' => 'form-select']
            ])
            ->add('equipe2', EntityType::class, [
                'class' => Equipe::class,
                'choice_label' => 'name',
                'label' => 'Team 2',
                'attr' => ['class' => 'form-select']
            ])
            ->add('scoreTeam1', IntegerType::class, [
                'label' => 'Score Team 1',
                'attr' => ['class' => 'form-control']
            ])
            ->add('scoreTeam2', IntegerType::class, [
                'label' => 'Score Team 2',
                'attr' => ['class' => 'form-control']
            ])
            ->add('dateMatch', DateTimeType::class, [
                'label' => 'Match Date & Time',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control']
            ])
            ->add('tournament', EntityType::class, [
                'class' => Tournament::class,
                'choice_label' => 'name',
                'attr' => ['class' => 'form-select']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MatchGame::class,
        ]);
    }
}
