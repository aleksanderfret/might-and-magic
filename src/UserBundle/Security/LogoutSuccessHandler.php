<?php

namespace UserBundle\Security;

use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LogoutSuccessHandler implements LogoutSuccessHandlerInterface
{

    public function onLogoutSuccess(Request $request)
    {
        $session = $request->getSession();
        
        if (null !== $session->get('previous_uri')) {
            $referer_url = $session->get('previous_uri');
        }
        else {
            //TODO odnośnik do głównej strony
            $referer_url = 'localhost';
        }
        
	$response = new RedirectResponse($referer_url);
        
        return $response;
    }
}
