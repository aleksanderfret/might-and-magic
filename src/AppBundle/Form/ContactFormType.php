<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use EWZ\Bundle\RecaptchaBundle\Form\Type\EWZRecaptchaType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\EqualTo;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\IsTrue as RecaptchaTrue;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'contact.name_label',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => "contact.name_blank"
                        ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => "contact.name_short",
                        'max' => 100,
                        'maxMessage' => "contact.name_long"
                        ]),
                    new Regex([
                        'pattern' => "/^[- a-zA-ZęóąśłżźćńĘĄŚŁŻŹĆŃ]+$/",
                        'htmlPattern' => "^[- a-zA-ZęóąśłżźćńĘĄŚŁŻŹĆŃ]+$",
                        'message' => "contact.name_mismatch"
                        ])
                    ]
                ]
            )
            ->add('email', EmailType::class, [
                'label' => 'contact.email_label',
                'required' =>true,
                'constraints' => [
                    new NotBlank([
                        'message' => "contact.email_blank"
                        ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => "contact.email_short",
                        'max' => 180,
                        'maxMessage' => "contact.email_long"
                        ]),
                    new Email([
                        'message' => "contact.email_mismatch"
                        ])
                    ]
                ]
            )
            ->add('subject', TextType::class, [
                'label' => 'contact.subject_label',
                'required' =>true,
                'constraints' => [
                    new NotBlank([
                        'message' => "contact.subject_blank"
                        ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => "contact.subject_short",
                        'max' => 100,
                        'maxMessage' => "contact.subject_long"
                        ]),
                    new Regex([
                        'pattern' => "/^[-:?; ,()!._a-zA-ZęóąśłżźćńĘĄŚŁŻŹĆŃ0-9]+$/",
                        'htmlPattern' => "^[-:?; ,()!._a-zA-ZęóąśłżźćńĘĄŚŁŻŹĆŃ0-9]+$",
                        'message' => "contact.subject_mismatch"
                        ])
                    ]
                ]
            ) 
            ->add('message', TextareaType::class, [
                'label' => 'contact.message_label',
                'required' =>true,
                'constraints' => [
                    new NotBlank([
                        'message' => "contact.message_blank"
                        ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => "contact.message_short",
                        'max' => 10000,
                        'maxMessage' => "contact.message_long"
                        ]),
                    new Regex([
                        'pattern' => "/^[-:?; ,()!._a-zA-ZęóąśłżźćńĘĄŚŁŻŹĆŃ0-9]+$/",
                        'htmlPattern' => "^[-:?; ,()!._a-zA-ZęóąśłżźćńĘĄŚŁŻŹĆŃ0-9]+$",
                        'message' => "contact.message_mismatch"
                        ])
                    ]
                ]
            )
            ->add('sendtome', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'multiple' => true,
                'choices' => ['contact.sendtome_label' => 1]
                ]
            )
            ->add('robot', ChoiceType::class, [
                'label'=> false,
                'expanded' => true,
                'multiple' => true,
                'choices' => ['contact.robot_label' => 1],
                'constraints' => [
                    new EqualTo([
                        'value' => [],
                        'message' => "contact.robot"
                        ])
                    ]
                ]
            )
            ->add('recaptcha', EWZRecaptchaType::class, [
                'mapped' => false,
                'constraints' => [
                    new RecaptchaTrue()
                    ]
                ]
            )
            ->add('send', SubmitType::class, [
                'label'=> 'contact.action_send_message'
                ]
            )
            ->getForm();
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'error_bubbling' => true
            ]
        );
    }
}
