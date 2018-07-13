<?php

namespace RemovalBundle\Form;

use RemovalBundle\Entity\Mythique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterMythiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('skill', ChoiceType::class, [
            'label' => 'Skill désiré',
            'choices' => array(
                'Débutant' => 'Débutant',
                'Intermédiaire' => 'Intermédiaire',
                'Pro' => 'Pro',
                'Divin' => 'Divin'
            )
        ]);

        $builder->add('objectif', ChoiceType::class, [
            'label' => 'Vos objectifs pour ce groupe ?',
            'choices' => array(
                'Timer' => 'Timer',
                'Lvlup Key' => 'Lvlup Key',
                'Donjon de la semaine' => 'Donjon de la semaine',
                'Terminé sans prise de tête' => 'Terminé sans prise de tête'
            )
        ]);

        $builder->add('save', SubmitType::class, [
            'label' => 'Envoyer'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Mythique::class);
    }

    public function getBlockPrefix()
    {
        return 'mythique_type';
    }
}
