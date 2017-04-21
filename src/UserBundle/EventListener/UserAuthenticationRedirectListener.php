<?php

namespace UserBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\SecurityEvents;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpFoundation\Session;
use FOS\UserBundle\FOSUserEvents;

class UserAuthenticationRedirectListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
        SecurityEvents::INTERACTIVE_LOGIN => 'redirectOnAuthenticationSuccess',
        FOSUserEvents::SECURITY_IMPLICIT_LOGIN => 'redirectOnAuthenticationSuccess'
        ];
    }
    
    public function redirectOnAuthenticationSuccess(InteractiveLoginEvent $event)
    {
        /* @var $session Session */
        $session = $event->getRequest()->getSession();
        if (null !== $session->get('last_uri')) {
            $session->set('_security.main.target_path', $session->get('last_uri'));
        }
    }
}
