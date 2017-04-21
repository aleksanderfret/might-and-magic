<?php

namespace UserBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use UserBundle\Entity\User;

/**
 * Listener responsible to add registering date to the form data and save it into the database
 */
class UserRegisterDateListener implements EventSubscriberInterface
{
    
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
        );
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        /* @var $newUser User */
        $newUser = $event->getForm()->getData();
        $newUser->setRegDate(new \DateTime());
        $newUser->addRole('ROLE_USER');
    }
}
