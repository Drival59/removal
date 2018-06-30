<?php

namespace RemovalBundle\Form;

use KMS\FroalaEditorBundle\Form\Type\FroalaEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class NewsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('title', TextType::class,['label'=>'Titre'])
          ->add('description', TextType::class,['label'=>'Description *max 255 caractères*'])
          ->add('content', FroalaEditorType::class, array(
            'required' => false,
              'label'=>'Contenu de la news'))
          ->add('inCarousel', CheckboxType::class, array(
            'label' => "Cochez si vous voulez l'actualité dans le caroussel",
            'required' => false))
          ->add('imageUrl', FileType::class,['label'=>'Image de la news'])
          ->add('save', SubmitType::class);

    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RemovalBundle\Entity\News'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'removalbundle_news';
    }


}
