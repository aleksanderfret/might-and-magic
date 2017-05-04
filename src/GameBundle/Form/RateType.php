<?php

namespace GameBundle\Form;

use GameBundle\Entity\Rate;
use GameBundle\Entity\GameUserRate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('rate', EntityType::class, [
            'class' => 'GameBundle:Rate',
            'choice_label' => 'value',
            'expanded' => true,
            'multiple' => false,
            'choice_attr' => function ($val, $key, $index) {
                return ['title' => $val->getLabel()];
            }]);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GameUserRate::class,
        ]);
    }
}
