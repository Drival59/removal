<?php

namespace RemovalBundle\Form;

use RemovalBundle\Entity\Joueur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JoueurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('pseudo', TextType::class, [
            'label' => 'Pseudo du personnage'
        ]);

        $builder->add('classe', ChoiceType::class, [
            'label' => 'Classe du personnage',
            'choices' => array(
                'Chasseurs' => 'Chasseurs',
                'Prêtre' => 'Prêtre',
                'Guerrier' => 'Guerrier',
                'Chevalier de la mort' => 'Chevalier de la mort',
                'Mage' => 'Mage',
                'Voleur' => 'Voleur',
                'Chasseur de démons' => 'Chasseur de démons',
                'Moine' => 'Moine',
                'Chaman' => 'Chaman',
                'Druide' => 'Druide',
                'Paladin' => 'Paladin',
                'Démoniste' => 'Démoniste'
            ),
        ]);

        $builder->add('specialisation', ChoiceType::class, [
            'label' => 'Spécialisation du personnage',
            'choices' => array(
                'Chasseurs' => array(
                    'Maîtrise des bêtes' => 'Maîtrise des bêtes',
                    'Précision' => 'Précision',
                    'Survie' => 'Survie'
                ),
                'Prêtre' => array(
                    'Discipline' => 'Discipline',
                    'Sacré' => 'Sacré',
                    'Ombre' => 'Ombre'
                ),
                'Guerrier' => array(
                    'Armes' => 'Armes',
                    'Furie' => 'Furie',
                    'Protection' => 'Protection'
                ),
                'Chevalier de la mort' => array(
                    'Sang' => 'Sang',
                    'Givre' => 'Givre',
                    'Impie' => 'Impie'
                ),
                'Mage' => array(
                    'Arcane' => 'Arcane',
                    'Feu' => 'Feu',
                    'Givre' => 'Givre'
                ),
                'Voleur' => array(
                    'Assassinat' => 'Assassinat',
                    'Hors-la-loi' => 'Hors-la-loi',
                    'Finesse' => 'Finesse'
                ),
                'Chasseur de démons' => array(
                    'Dévastation' => 'Dévastation',
                    'Vengeance' => 'Vengeance'
                ),
                'Moine' => array(
                    'Marche-vent' => 'Marche-vent',
                    'Tisse brume' => 'Tisse Brume',
                    'Maitre brasseur' => 'Maitre Brasseur'
                ),
                'Chaman' => array(
                    'Élémentaire' => 'Élémentaire',
                    'Amélioration' => 'Amélioration',
                    'Restauration' => 'Restauration'
                ),
                'Druide' => array(
                    'Équilibre' => 'Équilibre',
                    'Féral' => 'Féral',
                    'Gardien' => 'Gardien',
                    'Restauration' => 'Restauration'
                ),
                'Paladin' => array(
                    'Sacré' => 'Sacré',
                    'Protection' => 'Protection',
                    'Rétribution' => 'Rétribution'
                ),
                'Démoniste' => array(
                    'Affliction' => 'Affliction',
                    'Démonologie' => 'Démonologie',
                    'Destruction' => 'Destruction'
                ),
            ),
        ]);

        $builder->add('save', SubmitType::class, [
            'label' => 'Envoyer',
            'attr' => array('class' => 'btn-removal'),
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Joueur::class);
    }

    public function getBlockPrefix()
    {
        return 'joueur_type';
    }
}
