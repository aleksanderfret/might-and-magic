<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'label' => 'Imię',
            ]);
        $builder->add('surname', TextType::class, [
            'label' => 'Nazwisko',
            ]);
        $builder->add('avatar', EntityType::class, [
            'class' => 'UserBundle:Avatar',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('u')->orderBy('u.name', 'ASC');
            },
            'choice_label' => 'name',
            'expanded' => false,
            'multiple' => false
            ]);
    }
    
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }
}
