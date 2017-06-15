<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'label' => 'registratin.user.name',
            ]);
        $builder->add('surname', TextType::class, [
            'label' => 'registration.user.surname',
            ]);
        $builder->add('avatar', EntityType::class, [
            'class' => 'UserBundle:Avatar',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('u')->orderBy('u.name', 'ASC');
            },
            'choice_label' => 'name',
            'expanded' => false,
            'multiple' => false,
            'label' => 'registratioin.user.avatar'
            ]);
    }
    
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}
