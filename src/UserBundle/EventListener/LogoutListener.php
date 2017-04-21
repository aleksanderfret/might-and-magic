<?php

namespace UserBundle\EventListener;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;
use FOS\UserBundle\Model\UserManagerInterface;

class LogoutListener implements LogoutHandlerInterface
{
    protected $userManager;
    
    public function __construct(UserManagerInterface $userManager){
        $this->userManager = $userManager;
    }
    
    public function logout(Request $request, Response $response, TokenInterface $token) {
        $session = $request->getSession();
        if (null !== $session->get('last_uri')) {
            $session->set('_security.main.target_path', $session->get('last_uri'));
        }
        file_put_contents('D:\sesja.txt', print_r($session, true));
    }
}
