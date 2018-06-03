<?php

namespace RemovalBundle\Form;

use RemovalBundle\Entity\Participation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParticipationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomParticipation', TextType::class, [
            'label' => 'Nom de la participation'
        ]);

        $builder->add('importance', ChoiceType::class, [
            'choices' => array(
                'Courant' => 'Courant',
                'Urgent' => 'Urgent',
                'Normal' => 'Normal'
            )
        ]);

        $builder->add('dateDebut', DateType::class, [
            'label' => 'Date début participation'
        ]);

        $builder->add('dateFin', DateType::class, [
            'label' => 'Date fin participation'
        ]);

        $builder->add('nomCompo1', TextType::class, [
            'label' => 'Compo 1'
        ]);

        $builder->add('nbrCompo1', IntegerType::class, [
            'label' => 'Nombre demandé'
        ]);

        $builder->add('nomCompo2', TextType::class, [
            'label' => 'Compo 2'
        ]);

        $builder->add('nbrCompo2', IntegerType::class, [
            'label' => 'Nombre demandé'
        ]);

        $builder->add('nomCompo3', TextType::class, [
            'label' => 'Compo 3'
        ]);

        $builder->add('nbrCompo3', IntegerType::class, [
            'label' => 'Nombre demandé'
        ]);

        $builder->add('nomCompo4', TextType::class, [
            'label' => 'Compo 4'
        ]);

        $builder->add('nbrCompo4', IntegerType::class, [
            'label' => 'Nombre demandé'
        ]);

        $builder->add('nomCompo5', TextType::class, [
            'label' => 'Compo 5'
        ]);

        $builder->add('nbrCompo5', IntegerType::class, [
            'label' => 'Nombre demandé'
        ]);

        $builder->add('nomCompo6', TextType::class, [
            'label' => 'Compo 6'
        ]);

        $builder->add('nbrCompo6', IntegerType::class, [
            'label' => 'Nombre demandé'
        ]);

        $builder->add('nomCompo7', TextType::class, [
            'label' => 'Compo 7'
        ]);

        $builder->add('nbrCompo7', IntegerType::class, [
            'label' => 'Nombre demandé'
        ]);

        $builder->add('nomCompo8', TextType::class, [
            'label' => 'Compo 8'
        ]);

        $builder->add('nbrCompo8', IntegerType::class, [
            'label' => 'Nombre demandé'
        ]);

        $builder->add('nomCompo9', TextType::class, [
            'label' => 'Compo 9'
        ]);

        $builder->add('nbrCompo9', IntegerType::class, [
            'label' => 'Nombre demandé'
        ]);

        $builder->add('nomCompo10', TextType::class, [
            'label' => 'Compo 10'
        ]);

        $builder->add('nbrCompo10', IntegerType::class, [
            'label' => 'Nombre demandé'
        ]);

        $builder->add('save', SubmitType::class, [
            'label' => 'Envoyer'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class',Participation::class);
//        $resolver->setDefault('csrf_protection', false);
        $resolver->setDefault('attr', array('novalidate' => true));
    }

    public function getBlockPrefix()
    {
        return 'participation_type';
    }
}
