<?php

namespace UserBundle\Controller;

use FOS\UserBundle\Controller\ProfileController as FOSProfileController;

/**
 * Description of UserController
 *
 * @author Olek
 */
class UserProfileController extends FOSProfileController
{
    
    public function showExtendedAction(){
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $userRate = $this->get('doctrine')->getRepository('GameBundle:Game')->getUserGameRate($game->getId(), $user->getId());
        
        return $this->render('@FOSUser/Profile/show.html.twig', array(
            'user' => $user,
        ));
    }
}
