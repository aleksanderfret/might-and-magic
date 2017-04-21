<?php

namespace UserBundle\Security;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
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
