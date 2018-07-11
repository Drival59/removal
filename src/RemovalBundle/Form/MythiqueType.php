<?php

namespace RemovalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MythiqueType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
            ->add('description')
            ->add('chefDuGroupe')
            ->add('discord', ChoiceType::class, [
                'label' => 'Vocal obligatoire ?',
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                )
            ])
            ->add('battletag')
            ->add('ilvl')
            ->add('dps1', ChoiceType::class, [
                'choices' => array(
                    'Ouvert' => 'Ouvert',
                    'Fermé' => 'Fermé',
                    'Dps distance' => 'Dps distance',
                    'Dps cac' => 'Dps cac',
                    "J'occupe cette place" => "J'occupe cette place",
                    'Chasseurs' => array(
                        'Maîtrise des bêtes' => 'Chasseur - Maîtrise des bêtes',
                        'Précision' => 'Chasseur - Précision',
                        'Survie' => 'Chasseur - Survie'
                    ),
                    'Prêtre' => array(
                        'Discipline' => 'Prêtre - Discipline',
                        'Ombre' => 'Prêtre - Ombre'
                    ),
                    'Guerrier' => array(
                        'Armes' => 'Guerrier - Armes',
                        'Furie' => 'Guerrier - Furie',
                    ),
                    'Chevalier de la mort' => array(
                        'Givre' => 'Dk - Givre',
                        'Impie' => 'Dk - Impie'
                    ),
                    'Mage' => array(
                        'Arcane' => 'Mage - Arcane',
                        'Feu' => 'Mage - Feu',
                        'Givre' => 'Mage - Givre'
                    ),
                    'Voleur' => array(
                        'Assassinat' => 'Voleur - Assassinat',
                        'Hors-la-loi' => 'Voleur - Hors-la-loi',
                        'Finesse' => 'Voleur - Finesse'
                    ),
                    'Chasseur de démons' => array(
                        'Dévastation' => 'Dh - Dévastation',
                    ),
                    'Moine' => array(
                        'Marche-vent' => 'Moine - Marche-vent',
                    ),
                    'Chaman' => array(
                        'Élémentaire' => 'Chaman - Élémentaire',
                        'Amélioration' => 'Chaman - Amélioration',
                    ),
                    'Druide' => array(
                        'Équilibre' => 'Druide - Équilibre',
                        'Féral' => 'Druide - Féral',
                    ),
                    'Paladin' => array(
                        'Rétribution' => 'Paladin - Rétribution'
                    ),
                    'Démoniste' => array(
                        'Affliction' => 'Démo - Affliction',
                        'Démonologie' => 'Démo - Démonologie',
                        'Destruction' => 'Démo - Destruction'
                    ),
                )
            ])
            ->add('dps2', ChoiceType::class, [
                'choices' => array(
                    'Ouvert' => 'Ouvert',
                    'Fermé' => 'Fermé',
                    'Dps distance' => 'Dps distance',
                    'Dps cac' => 'Dps cac',
                    "J'occupe cette place" => "J'occupe cette place",
                    'Chasseurs' => array(
                        'Maîtrise des bêtes' => 'Chasseur - Maîtrise des bêtes',
                        'Précision' => 'Chasseur - Précision',
                        'Survie' => 'Chasseur - Survie'
                    ),
                    'Prêtre' => array(
                        'Discipline' => 'Prêtre - Discipline',
                        'Ombre' => 'Prêtre - Ombre'
                    ),
                    'Guerrier' => array(
                        'Armes' => 'Guerrier - Armes',
                        'Furie' => 'Guerrier - Furie',
                    ),
                    'Chevalier de la mort' => array(
                        'Givre' => 'Dk - Givre',
                        'Impie' => 'Dk - Impie'
                    ),
                    'Mage' => array(
                        'Arcane' => 'Mage - Arcane',
                        'Feu' => 'Mage - Feu',
                        'Givre' => 'Mage - Givre'
                    ),
                    'Voleur' => array(
                        'Assassinat' => 'Voleur - Assassinat',
                        'Hors-la-loi' => 'Voleur - Hors-la-loi',
                        'Finesse' => 'Voleur - Finesse'
                    ),
                    'Chasseur de démons' => array(
                        'Dévastation' => 'Dh - Dévastation',
                    ),
                    'Moine' => array(
                        'Marche-vent' => 'Moine - Marche-vent',
                    ),
                    'Chaman' => array(
                        'Élémentaire' => 'Chaman - Élémentaire',
                        'Amélioration' => 'Chaman - Amélioration',
                    ),
                    'Druide' => array(
                        'Équilibre' => 'Druide - Équilibre',
                        'Féral' => 'Druide - Féral',
                    ),
                    'Paladin' => array(
                        'Rétribution' => 'Paladin - Rétribution'
                    ),
                    'Démoniste' => array(
                        'Affliction' => 'Démo - Affliction',
                        'Démonologie' => 'Démo - Démonologie',
                        'Destruction' => 'Démo - Destruction'
                    ),
                )
            ])
            ->add('dps3', ChoiceType::class, [
                'choices' => array(
                    'Ouvert' => 'Ouvert',
                    'Fermé' => 'Fermé',
                    'Dps distance' => 'Dps distance',
                    'Dps cac' => 'Dps cac',
                    "J'occupe cette place" => "J'occupe cette place",
                    'Chasseurs' => array(
                        'Maîtrise des bêtes' => 'Chasseur - Maîtrise des bêtes',
                        'Précision' => 'Chasseur - Précision',
                        'Survie' => 'Chasseur - Survie'
                    ),
                    'Prêtre' => array(
                        'Discipline' => 'Prêtre - Discipline',
                        'Ombre' => 'Prêtre - Ombre'
                    ),
                    'Guerrier' => array(
                        'Armes' => 'Guerrier - Armes',
                        'Furie' => 'Guerrier - Furie',
                    ),
                    'Chevalier de la mort' => array(
                        'Givre' => 'Dk - Givre',
                        'Impie' => 'Dk - Impie'
                    ),
                    'Mage' => array(
                        'Arcane' => 'Mage - Arcane',
                        'Feu' => 'Mage - Feu',
                        'Givre' => 'Mage - Givre'
                    ),
                    'Voleur' => array(
                        'Assassinat' => 'Voleur - Assassinat',
                        'Hors-la-loi' => 'Voleur - Hors-la-loi',
                        'Finesse' => 'Voleur - Finesse'
                    ),
                    'Chasseur de démons' => array(
                        'Dévastation' => 'Dh - Dévastation',
                    ),
                    'Moine' => array(
                        'Marche-vent' => 'Moine - Marche-vent',
                    ),
                    'Chaman' => array(
                        'Élémentaire' => 'Chaman - Élémentaire',
                        'Amélioration' => 'Chaman - Amélioration',
                    ),
                    'Druide' => array(
                        'Équilibre' => 'Druide - Équilibre',
                        'Féral' => 'Druide - Féral',
                    ),
                    'Paladin' => array(
                        'Rétribution' => 'Paladin - Rétribution'
                    ),
                    'Démoniste' => array(
                        'Affliction' => 'Démo - Affliction',
                        'Démonologie' => 'Démo - Démonologie',
                        'Destruction' => 'Démo - Destruction'
                    ),
                )
            ])
            ->add('tank', ChoiceType::class, [
                'choices' => array(
                    'Ouvert' => 'Ouvert',
                    'Fermé' => 'Fermé',
                    "J'occupe cette place" => "J'occupe cette place",
                    'Guerrier' => array(
                        'Protection' => 'Guerrier - Protection'
                    ),
                    'Chevalier de la mort' => array(
                        'Sang' => 'Dk - Sang',
                    ),
                    'Chasseur de démons' => array(
                        'Vengeance' => 'Dh - Vengeance'
                    ),
                    'Moine' => array(
                        'Maitre brasseur' => 'Moine - Maitre Brasseur'
                    ),
                    'Druide' => array(
                        'Gardien' => 'Druide - Gardien'
                    ),
                    'Paladin' => array(
                        'Protection' => 'Paladin - Protection'
                    )
                )
            ])
            ->add('heal', ChoiceType::class, [
                'choices' => array(
                    'Ouvert' => 'Ouvert',
                    'Fermé' => 'Fermé',
                    "J'occupe cette place" => "J'occupe cette place",
                    'Prêtre' => array(
                        'Discipline' => 'Prêtre - Discipline',
                        'Sacré' => 'Prêtre - Sacré',
                    ),
                    'Moine' => array(
                        'Tisse brume' => 'Moine - Tisse Brume'
                    ),
                    'Chaman' => array(
                        'Restauration' => 'Chaman - Restauration'
                    ),
                    'Druide' => array(
                        'Restauration' => 'Druide - Restauration'
                    ),
                    'Paladin' => array(
                        'Sacré' => 'Paladin - Sacré'
                    ),
                )
            ])
            ->add('consommable', ChoiceType::class, [
                'label' => 'Consommables sont ils requis ?',
                'choices' => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                )
            ])
            ->add('skill', ChoiceType::class, [
                'label' => 'Niveau de Skill demandé',
                'choices' => array(
                    'Débutant' => 'Débutant',
                    'Intermédiaire' => 'Intermédiaire',
                    'Pro' => 'Pro',
                    'Divin' => 'Divin'
                )
            ])
            ->add('tempsDeJeu', ChoiceType::class, [
                'label' => 'Taux de disponibilité',
                'choices' => array(
                    'Aucune importance' => 'Aucune importance',
                    'Peu' => 'Peu',
                    'Moyen' => 'Moyen',
                    'Beaucoup' => 'Beaucoup',
                    'No-Life' => 'No-Life'
                )
            ])
            ->add('styleDeGroupe', ChoiceType::class, [
                'label' => 'Style du groupe',
                'choices' => array(
                    'Familial' => 'Familial',
                    'Décontracté' => 'Décontracté',
                    'Fun' => 'Fun',
                    'Sérieux' => 'Sérieux',
                    'Ultra-Pro' => 'Ultra-Pro',
                    "Pas droit à l'erreur" => "Pas droit à l'erreur"
                )
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Status du groupe',
                'choices' => array(
                    'Fermé' => 'Fermé',
                    'Ouvert' => 'Ouvert'
                )
            ])
            ->add('user')
            ->add('faction', ChoiceType::class, [
                'label' => 'Quelle faction ?',
                'choices' => array(
                    'Horde' => 'Horde',
                    'Alliance' => 'Alliance'
                )
            ]);

        $builder->add('save', SubmitType::class, [
            'label' => 'Envoyer'
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RemovalBundle\Entity\Mythique'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'removalbundle_mythique';
    }


}
