<?php

namespace RemovalBundle\Form;

use RemovalBundle\Entity\Bossdown;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BossdownType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('raid', EntityType::class,
            array( 'class' => 'RemovalBundle\Entity\Raid',
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false));

        $builder->add('name', TextType::class, [
            'label' => 'Nom du boss'
        ]);

        $builder->add('nm', CheckboxType::class, [
            'label' => 'Boss Normal mort ?',
            'required' => false
        ]);

        $builder->add('hm', CheckboxType::class, [
            'label' => 'Boss Héroique mort ?',
            'required' => false
        ]);

        $builder->add('mm', CheckboxType::class, [
            'label' => 'Boss Mythique mort ?',
            'required' => false
        ]);

        $builder->add('imageUrl', TextType::class, [
            'label' => 'Image du boss'
        ]);

        $builder->add('save', SubmitType::class, [
            'label' => 'Envoyer'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Bossdown::class);
    }

    public function getBlockPrefix()
    {
        return 'bossdown_type';
    }
}
