<?php

namespace AppBundle\Event;

final class Events
{
    /**
     * @Event("Symfony\Component\EventDispatcher\GenericEvent")
     *
     * @var string
     */
    const MESSAGE_CREATED = 'contact.message_created';
    
    /**
     * @Event("Symfony\Component\EventDispatcher\GenericEvent")
     *
     * @var string
     */
    const MESSAGE_SENDING_SUCCESS = 'contact.sending_success';
    
    /**
     * @Event("Symfony\Component\EventDispatcher\GenericEvent")
     *
     * @var string
     */
    const MESSAGE_SENDING_FAILURE = 'contact.sending_failure';
    
    /**
     * @Event("Symfony\Component\EventDispatcher\GenericEvent")
     *
     * @var string
     */
    const MESSAGE_INVALID = 'contact.message_invalid';
    
    
}
