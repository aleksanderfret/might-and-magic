<?php

namespace UserBundle\EventListener;

use Symfony\Component\HttpFoundation\Session;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;

class LastRouteListener
{
    public function onKernelRequest(GetResponseEvent $event)
    {
        // Do not save subrequests
        if ($event->getRequestType() !== HttpKernel::MASTER_REQUEST) {
            return;
        }

        $request = $event->getRequest();
        /* @var $session Session */
        $session = $request->getSession();

        $thisRouteName = $request->get('_route');
        $thisRouteParams = $request->get('_route_params');
        if ($thisRouteName[0] == '_') {
            return;
        }

        if ($thisRouteName == 'fos_user_security_login') {
            $session->set('previous_uri', $session->get('this_uri'));   
        }
        elseif ($thisRouteName == 'fos_user_security_check') {
            if (null == $session->get('previous_uri')
                && null != $session->get('this_uri')) {
                $session->set('previous_uri', $session->get('this_uri'));
            }
        }
        elseif ($thisRouteName == 'fos_user_security_logout') {            
            return;            
        }
        else {        
            $thisUri = $request->getUri();
            $previousUri = $session->get('this_uri');
            if ($previousUri != $thisUri) {
                $session->set('previous_uri', $previousUri);
                $session->set('this_uri', $thisUri);
            }            
        }
        
        $thisRoute = ['name' => $thisRouteName, 'params' => $thisRouteParams];
        $previousRoute = $session->get('this_route', []);
        $session->set('previous_route', $previousRoute);
        $session->set('this_route', $thisRoute);
        
        file_put_contents('D:\sesja2.txt', print_r($session, true));
    }
}
