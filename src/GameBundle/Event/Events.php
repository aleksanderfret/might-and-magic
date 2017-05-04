<?php

namespace GameBundle\Event;

final class Events
{
    /**
     * @Event("Symfony\Component\EventDispatcher\GenericEvent")
     *
     * @var string
     */
    const COMMENT_CREATED = 'comment.created';
    
    /**
     * @Event("Symfony\Component\EventDispatcher\GenericEvent")
     *
     * @var string
     */
    const RATE_ADDED = 'rate.added';
}
