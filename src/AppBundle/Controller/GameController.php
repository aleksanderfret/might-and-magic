<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
#use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
#use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GameController extends Controller
{

    /**
     * @Route("gry/{title}", name="show_game")     *
     */
    public function showGameAction($title = "allGames")
    {
        $em = $this->get('doctrine')->getManager();
        
        if ($title == "allGames") {
            $games = $em->getRepository('AppBundle:Game')->findAll();
            $template = 'game/gry.html.twig';
        } else {
            $games = $em->getRepository('AppBundle:Game')->findOneBy(array('title' => $title));
            $template = 'game/gra.html.twig';
        }
        
        return $this->render($template, array(
                        'game' => $games));
    }
    
    /**
     * @Route("gry/{title}/edycja", name="editGame")
     */
    public function editGameAction($title)
    {
        return new Response("Edycja gry: " . $title . ".");
    }
    
    /**
     * @Route("gry/ocena/{title}", name="rateGame")
     * @Method({"GET"})
     */
    public function addRateAction($title)
    {
        return new Response("Gra " . $title . " ma ocenę 5.");
    }
    
    /**
     * @Route("gry/dodaj/grę", name="addGame")
     */
    public function addGameAction()
    {
        return new Response("Dodawanie gry");
    }
    
    /**
     * @Route("gry/usuń/grę", name="deleteGame")
     * @Method({"PUT"})
     */
    public function deleteGameAction()
    {
        return new Response("Usuwanie gry");
    }
}
