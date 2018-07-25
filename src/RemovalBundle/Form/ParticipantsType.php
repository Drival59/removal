<?php

namespace RemovalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParticipantsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nompersonnage', TextType::class, [
            'label' => 'Le nom de votre personnage'
        ])
            ->add('battletag', TextType::class, [
                'label' => 'Votre BattleTag'
            ])
            ->add('classe', ChoiceType::class, [
                'label' => 'Quelle est votre classe ?',
                'choices' => array(
                    'Chasseur' => 'Chasseur',
                    'Guerrier' => 'Guerrier',
                    'Mage' => 'Mage',
                    'Chaman' => 'Chaman',
                    'Moine' => 'Moine',
                    'Démoniste' => 'Démoniste',
                    'Prêtre' => 'Prêtre',
                    'Chevalier de la mort' => 'Chevalier de la mort',
                    'Chasseur de démon' => 'Chasseur de démon',
                    'Paladin' => 'Paladin',
                    'Voleur' => 'Voleur',
                    'Druide' => 'Druide'
                )
            ])
            ->add('specialisation', ChoiceType::class, [
                'label' => 'Le rôle que vous voulez occuper',
                'choices' => array(
                    'DPS CAC' => 'DPS CAC',
                    'DPS DISTANT' => 'DPS DISTANT',
                    'TANK' => 'TANK',
                    'HEAL' => 'HEAL'
                )
            ])
            ->add('message', TextType::class, [
                'label' => 'Message pour le chef du groupe ?'
            ])
        ->add('save', SubmitType::class, [
            'label' => 'Envoyer',
            'attr' => array('class' => 'btn-removal'),
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RemovalBundle\Entity\Participants'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'removalbundle_participants';
    }


}
