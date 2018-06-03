<?php

namespace RemovalBundle\Form;

use RemovalBundle\Entity\Status;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StatusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('status', ChoiceType::class, [
            'choices' => array(
                'Oui' => '1',
                'Non' => '0')
        ]);

        $builder->add('save', SubmitType::class, [
            'label' => 'Envoyer'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault(StatusType::class, Status::class);
    }

    public function getBlockPrefix()
    {
        return 'status_type';
    }
}
