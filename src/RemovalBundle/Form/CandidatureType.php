<?php

namespace RemovalBundle\Form;

use RemovalBundle\Entity\Candidature;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('pseudo', TextType::class, [
            'label' => 'Entrez le pseudo de votre personnage'
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

        $builder->add('battletag', TextType::class, [
            'label' => 'Entrez votre BattleTag'
        ]);

        $builder->add('armurerie', TextType::class, [
            'label' => 'Copier coller votre lien armurerie'
        ]);

        $builder->add('discord', ChoiceType::class, [
            'label' => 'Avez vous discord ?',
            'choices' => array(
                'Oui' => 'Oui',
                'Non' => 'Non'
            ),
        ]);

        $builder->add('joueurReference', TextType::class, [
            'label' => 'Connaissez vous un joueur dans la guilde ? Si oui, qui?'
        ]);

        $builder->add('disponibilite', DateTimeType::class, [
            'label' => 'Quand êtes vous disponible pour un entretien sur discord ?'
        ]);

        $builder->add('description', TextareaType::class, [
            'label' => 'Avez vous quelque chose à rajouter ? (plus de précision pour l\' de rendez vous ?'
        ]);

        $builder->add('save', SubmitType::class, [
            'label' => 'Envoyez votre candidature'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Candidature::class);
        $resolver->setDefault('attr', array('novalidate' => true));
    }

    public function getBlockPrefix()
    {
        return 'candidature_type';
    }
}
