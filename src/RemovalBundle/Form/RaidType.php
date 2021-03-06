<?php

namespace RemovalBundle\Form;

use RemovalBundle\Entity\Raid;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RaidType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'label' => 'Nom du raid'
        ]);

        $builder->add('inProgress', CheckboxType::class, [
            'label' => 'En progression ?',
            'required' => false
        ]);

        $builder->add('save', SubmitType::class, [
            'label' => 'Envoyer'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Raid::class);
    }

    public function getBlockPrefix()
    {
        return 'removal_bundle_raid_type';
    }
}
