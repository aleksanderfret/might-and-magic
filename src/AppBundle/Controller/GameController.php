<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GameController extends Controller
{
    
    /**
     * @Route("gry/{gameTitle}", name="show_game")
     */
    public function showGameAction($gameTitle="allGames")
    {
        #return new Response($gameTitle);
        
        
        return $this->render('gry/gry.html.twig', array(
            'gameTitle' => $gameTitle   ));
    }
    
    /**
     * @Route("gry/{gameTitle}/ocena", name="rate_game")
     * @Method({"GET"})
     */
        public function getRatingAction($gameTitle)
    {
        return new Response("Gra ".$gameTitle." ma ocenę 5.");
    }
    
    /**
     * @Route("gry/{gameTitle}/edycja", name="edit_game")
     * @Method({"PUT"})
     */
    public function editGameAction($gameTitle)
    {
        return new Response("Edycja gry: ".$gameTitle.".");
    }

}
