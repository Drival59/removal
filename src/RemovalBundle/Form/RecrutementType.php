<?php

namespace RemovalBundle\Form;

use Doctrine\Common\Collections\ArrayCollection;
use RemovalBundle\Entity\Recrutement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecrutementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('image', ChoiceType::class, [
            'choices' => array(
                'Chaman' => 'chaman.png',
                'Chasseur' => 'chasseur.png',
                'Guerrier' => 'guerrier.png',
                'Moine' => 'moine.png',
                'Chasseur de demon' => 'demon.png',
                'Demoniste' => 'demoniste.png',
                'Voleur' => 'voleur.png',
                'Druide' => 'druide.png',
                'Paladin' => 'paladin.png',
                'Mage' => 'mage.png',
                'Chevalier de la mort' => 'chevalier.png',
                'Prêtre' => 'pretre.png'
            )
        ]);

        $builder->add('classe', ChoiceType::class, [
            'choices' => array(
                'Chaman' => 'Chaman',
                'Chasseur' => 'Chasseur',
                'Guerrier' => 'Guerrier',
                'Moine' => 'Moine',
                'Chasseur de démon' => 'Chasseur de Démon',
                'Démoniste' => 'Démoniste',
                'Voleur' => 'Voleur',
                'Druide' => 'Druide',
                'Paladin' => 'Paladin',
                'Mage' => 'Mage',
                'Chevalier de la mort' => 'Chevalier de la mort',
                'Prêtre' => 'Prêtre'
            )
        ]);

        $builder->add('niveau', ChoiceType::class, [
            'choices' => array(
                'Basse' => 'Basse',
                'Moyenne' => 'Moyenne',
                'Haute' => 'Haute',
                'Urgent' => 'Urgent'
            )
        ]);

        $builder->add('save', SubmitType::class, [
            'label' => 'Envoyer'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Recrutement::class);
        $resolver->setDefault('attr', array('novalidate' => true));
    }

    public function getBlockPrefix()
    {
        return 'recrutement_type';
    }
}
