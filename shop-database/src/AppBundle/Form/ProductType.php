<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProductType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', null, array(
            'attr' => [
                'class' => 'form-control'
            ]
        ))->add('description', null, array(
            'attr' => [
                'class' => 'form-control'
            ]
        ))->add('price', MoneyType::class, array(
            'scale' => 0,
            'required' => false,
            'currency' => 'USD',
            'attr' => [
                'class' => 'form-control'
            ]
        ))->add('category', EntityType::class, array(
            'attr' => [
                'class' => 'form-control'
            ],
            'class' => 'AppBundle:Category',
            'choice_label' => 'name',
            // 'expanded' => true,
            // 'multiple' => false
        ))->add('tags', EntityType::class, array(
            'attr' => [
                'class' => 'form-control'
            ],
            'class' => 'AppBundle:Tag',
            'choice_label' => 'name',
            // 'expanded' => true,
            'multiple' => true
        ));;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_product';
    }


}
