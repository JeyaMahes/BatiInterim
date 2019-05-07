<?php

namespace JmBatiInterimBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class CorpsmetierType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('libellecorpsmetier', TextType::class, array('label' => 'Nom du Corps métier'))
                ->add('idsecteur', ChoiceType::class,
                        array('choices' => array('Stucture et Gros oeuvre' => 1,
                                                 'Enveloppe extérieure' => 2,
                                                 'Equipement technique' => 3,
                                                 'Aménagements et finitions' => 4)));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BatInterimBundle\Entity\Corpsmetier'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'batinterimbundle_corpsmetier';
    }


}
