<?php

namespace RemovalBundle\Form;

use RemovalBundle\Entity\Participation;
use RemovalBundle\Entity\Status;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StatusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('confirmation', ChoiceType::class, [
            'choices' => array(
                'Pas envoyé' => 'Pas envoyé',
                'Confirmation demandée' => 'Confirmation demandée',
                'Confirmation validée' => 'Confirmation validée'
            )
        ]);

//        $builder->add('participation', IntegerType::class, [
//            'cl'
//        ]);

        $builder->add('participation', EntityType::class,
            array( 'class' => 'RemovalBundle\Entity\Participation',
                'choice_label' => 'nomParticipation',
                'multiple' => false,
                'expanded' => false));

        $builder->add('utilisateur', EntityType::class,
            array( 'class' => 'RemovalBundle\Entity\User',
                'choice_label' => 'username',
                'multiple' => false,
                'expanded' => false));

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
