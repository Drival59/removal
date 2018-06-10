<?php

namespace RemovalBundle\Form;

use RemovalBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminEditUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $permissions = array(
            'Guilde' => 'ROLE_GUILDE',
            'SB' => 'ROLE_SB',
            'Utilisateur'        => 'ROLE_USER',
            'Administrateur'     => 'ROLE_ADMIN'
        );

        $builder->add('roles', ChoiceType::class, [
            'label' => 'Choix du role',
            'choices' => $permissions,
            'multiple' => true,
            'expanded' => true
        ]);

        $builder->add('save', SubmitType::class, [
            'label' => 'Envoyer'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', User::class);
    }

    public function getBlockPrefix()
    {
        return 'admin_edit_user_type';
    }
}
